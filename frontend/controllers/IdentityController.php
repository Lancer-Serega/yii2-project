<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 31.10.18
 * Time: 12:31
 */

namespace frontend\controllers;

use frontend\models\User;
use frontend\services\IdentityService;
use \Yii;
use frontend\models\SigninForm;
use yii\base\Exception;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use yii\web\Response;

/**
 * IdentityController controller
 */
class IdentityController extends BaseController
{
    /**
     * Logs in a user.
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $loginForm = new LoginForm();
        if ($loginForm->load(Yii::$app->request->post())) {
            try {
                if ($loginForm->login()) {
                    return $this->goBack();
                }
            } catch (\DomainException $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
                return $this->goHome();
            }
        }

        $loginForm->password = '';

        return $this->render('login', [
            'loginForm' => $loginForm,
        ]);
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
     * @throws \Exception
     */
    public function actionSignin()
    {
        if (!Yii::$app->getRequest()->isAjax) {
            Yii::$app->getResponse()->setStatusCode(404);
            Yii::$app->getResponse()->send();
        }

        Yii::$app->response->format = Response::FORMAT_JSON;

        $flashList = [];
        $errorList = [];
        $signinForm = new SigninForm();
        $service = new IdentityService();
        if ($signinForm->load(Yii::$app->request->post(), 'SigninForm')) {
            try {
                $user = $service->signin($signinForm);
                if ($user) {
                    $service->sendEmailConfirm($user);
                    $auth = Yii::$app->authManager;
                    $auth->assign($auth->getRole('user'), $user->id);
                    $this->responseStatus = self::RESPONSE_STATUS_SUCCESS;
                    $this->jsonData['data'] = [
                        'user_id' => $user->id,
                        'user_email' => $user->email,
                    ];
                    Yii::$app->session->setFlash('warning', Yii::t('form', 'To complete the registration, confirm your email. Check your email.'));
                }
            } catch (Exception $e) {
                Yii::$app->errorHandler->logException($e);
                $this->responseStatus = self::RESPONSE_STATUS_ERROR;
                $errorList[] = $e->getMessage();
                $flashList = ['error' => $e->getMessage()];
            }
        }

        $data = array_merge_recursive($this->jsonData, [
            'status' => $this->responseStatus,
            'errors' => $errorList,
            'flash' => $flashList,
        ]);

        return $data;
    }

    /**
     * Used to verify the token when the user clicks the confirmation link
     * (the link will contain this parameter, which will be found in the database).
     * @param $token
     * @return Response
     */
    public function actionSigninConfirm($token)
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
    public function actionResendEmail($token)
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