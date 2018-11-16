<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 31.10.18
 * Time: 12:31
 */

namespace frontend\controllers;

use frontend\models\Entity\User;
use frontend\services\IdentityService;
use \Yii;
use frontend\models\Form\SigninForm;
use yii\base\Exception;
use yii\base\InvalidArgumentException;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use frontend\models\Form\LoginForm;
use frontend\models\Form\PasswordResetRequestForm;
use frontend\models\Form\ResetPasswordForm;
use yii\web\Response;

/**
 * IdentityController controller
 */
class IdentityController extends BaseController
{
    /**
     * @return array
     */
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'login' => ['POST'],
                    'logout' => ['GET'],
                    'signin' => ['GET', 'POST'],
                    'signin-confirm' => ['GET'],
                    'resend-email' => ['GET'],
                    'request-password-resend' => ['GET', 'POST'],
                    'reset-password' => ['GET', 'POST'],
                ],
            ],
        ];
    }

    /**
     * Logs in a user.
     * @return mixed
     */
    public function actionLogin()
    {
        $this->responseStatus = self::RESPONSE_STATUS_ERROR;

        $loginForm = new LoginForm();
        if ($loginForm->load(Yii::$app->request->post())) {
            try {
                if ($loginForm->login()) {
                    $this->responseStatus = self::RESPONSE_STATUS_SUCCESS;
                    $this->jsonData['redirect'] = Yii::$app->getUser()->getReturnUrl();
                    if (\Yii::$app->getRequest()->isAjax) {
                        return $this->asJson($this->jsonData);
                    }

                    return $this->render('@app/views/themes/admin-pro/index/index');
                }

                $this->jsonData['flash']['error'] = $loginForm->getErrorSummary(true);
            } catch (\DomainException $e) {
                $msg = Yii::t('error', 'Excuse me.');
                $msg .= Yii::t('error', 'An authorization failed.');
                $msg .= Yii::t('error', 'Our development team is already trying to fix this problem.');
                $msg .= Yii::t('error', 'Soon we will fix it.');
                $this->jsonData['flash']['error'][] = Yii::t('error', $msg);
                if (\Yii::$app->getRequest()->isAjax) {
                    return $this->asJson($this->jsonData);
                }

                return $this->render('@app/views/themes/admin-pro/index/index');
            }
        }

        if (\Yii::$app->getRequest()->isAjax) {
            return $this->asJson($this->jsonData);
        }

        return $this->render('@app/views/themes/admin-pro/index/index');
    }

    /**
     * Logs out the current user.
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Signs user up.
     * @return mixed
     * @throws \Throwable
     */
    public function actionSignin()
    {
        $signinForm = new SigninForm();
        $service = new IdentityService();
        if ($signinForm->load(Yii::$app->request->post(), 'SigninForm')) {
            try {
                $user = $service->signin($signinForm);
                if ($user) {
                    $service->sendEmailConfirm($user);
                    $this->responseStatus = self::RESPONSE_STATUS_SUCCESS;
                    $this->jsonData['data'] = [
                        'user_id' => $user->id,
                        'user_email' => $user->email,
                    ];
                    $this->jsonData['flash']['info'][] = Yii::t('form', 'To complete the registration, confirm your email. Check your email.');
                } else {
                    $this->responseStatus = self::RESPONSE_STATUS_ERROR;
                    $this->jsonData['form'] = $signinForm->getErrors();
                    $this->jsonData['flash']['error'] = $signinForm->getErrors();
                }
            } catch (Exception $e) {
                Yii::$app->errorHandler->logException($e);
                $this->responseStatus = self::RESPONSE_STATUS_ERROR;
            }
        }
        $this->jsonData['status'] = $this->responseStatus;

        if (\Yii::$app->getRequest()->isAjax) {
            return $this->asJson($this->jsonData);
        }

        return $this->goHome();
    }

    /**
     * Used to verify the token when the user clicks the confirmation link
     * (the link will contain this parameter, which will be found in the database).
     * @param $token
     * @return Response
     */
    public function actionSigninConfirm($token): Response
    {
        $identityService = new IdentityService();

        try {
            $identityService->confirmation($token);
            Yii::$app->session->setFlash('success', Yii::t('form', 'You have successfully confirmed your email.'));
        } catch (\Exception $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        return $this->goHome();
    }

    /**
     * Resend email confirm user
     * @param $token
     */
    public function actionResendEmail($token): void
    {
        /**
         * @var User $user
         */
        $user = User::findIdentityByEmailConfirmToken($token);
        $service = new IdentityService();
        $service->sendEmailConfirm($user);
        Yii::$app->session->setFlash('success', Yii::t('form', 'To complete the registration, confirm your email. Check your email.'));
        $this->goHome();
    }

    /**
     * Requests password reset.
     * @return mixed
     * @throws Exception
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', Yii::t('form', 'Check your email for further instructions.'));

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', Yii::t('form', 'Sorry, we are unable to reset password for the provided email address.'));
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     * @throws Exception
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', Yii::t('form', 'New password saved.'));

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}