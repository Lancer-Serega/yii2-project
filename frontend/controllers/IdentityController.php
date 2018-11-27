<?php

/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 31.10.18
 * Time: 12:31
 */

namespace frontend\controllers;

use frontend\models\Entity\UserEntity;
use frontend\models\Form\UserConfigForm;
use frontend\services\IdentityService;
use \Yii;
use frontend\models\Form\SigninForm;
use yii\base\Exception;
use yii\base\InvalidArgumentException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use frontend\models\Form\LoginForm;
use frontend\models\Form\PasswordResetRequestForm;
use frontend\models\Form\ResetPasswordForm;
use yii\web\Response;

/**
 * IdentityController controller
 *
 * Class IdentityController
 * @package frontend\controllers
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
     * Login a user.
     *
     * @return mixed
     * @throws \Exception
     */
    public function actionLogin()
    {
        $this->responseStatus = self::RESPONSE_STATUS_ERROR;

        $loginForm = new LoginForm();
        if ($loginForm->load(Yii::$app->request->post())) {
            try {
                if ($loginForm->login($this)) {
                    $this->responseStatus = self::RESPONSE_STATUS_SUCCESS;
                    $this->jsonData['redirect'] = Yii::$app->getUser()->getReturnUrl();
                    if (\Yii::$app->getRequest()->isAjax) {
                        return $this->asJson($this->jsonData);
                    }

                    return $this->render('cabinet/settings');
                }
                $loginForm->password = null;
                $msg = \Yii::t('form', 'Incorrect username or password.');
                \Yii::$app->session->setFlash('error', $msg);
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

                return $this->render('cabinet/settings');
            }
        }

        if (\Yii::$app->getRequest()->isAjax) {
            return $this->asJson($this->jsonData);
        }

        return $this->render('cabinet/settings', ['loginForm' => $loginForm]);
    }

    /**
     * Accept user two factor auth after login.
     *
     * @return string|null
     */
    public function actionAcceptTwoFactorAuth(): ?string
    {
        $session = Yii::$app->session;
        $userId = $session->get('user_id');
        if (!$userId) {
            $msg = '<strong class="bold text-danger">' . \Yii::t('error', 'Authorization key expired!') . '</strong><br>';
            $msg .= \Yii::t('error', 'You can regenerate the key again (it will be sent to the email you provided during registration).');
            $session->setFlash('error', $msg);
            $this->redirect('index')->send();
            return null;
        }

        $user = UserEntity::findIdentity($userId);
        $key = $user->getUserConfig()->getTwoFactorAuthKey();
        $msg = 'You have two-factor authentication enabled. ';
        $msg .= 'To continue logging in, you need to verify your email address provided during registration. ';
        $msg .= 'In the letter you will see a token, copy it in the box below or follow the link in the letter.';

        // FIXME: remove before deploy in production!
        $msgTemporary = "<hr><span class='text-danger'>&gt;&gt;TEMPORARY&lt;&lt;</span> "
            . "Или скопируйте этот ключ <span class='text-danger bold'><code>$key</code></span><br>"
            . 'Или перейдите <span class=\'text-danger\'><a href="/accept-two-factor-auth?key=' . $key . '">по этой временной ссылке =)</a></span>';
        \Yii::$app->session->setFlash('info', Yii::t('form', $msg) . $msgTemporary);

        $userConfigForm = new UserConfigForm();

        return $this->render('accept-two-factor-auth', [
            'userConfigForm' => $userConfigForm,
            'twoFactorAuthKey' => Yii::$app->request->get('key'),
        ]);
    }

    /**
     * Two-factor authentication key verification.
     *
     * @return Response
     */
    public function actionCheckTwoFactorAuth(): Response
    {
        $userId = \Yii::$app->session->get('user_id');
        $userConfigForm = new UserConfigForm();
        if ($userId && $userConfigForm->load(Yii::$app->request->get())) {
            $service = new IdentityService();
            if ($service->checkTwoFactorAuthKey($userId, $userConfigForm->twoFactorAuthKey)) {
                return $this->redirect(Url::to('cabinet/settings'));
            }
        }

        \Yii::$app->session->setFlash('error', Yii::t('form', 'Authorisation Error!'));
        
        return $this->redirect(Yii::$app->getUser()->getReturnUrl());
    }

    /**
     * Logout the current user.
     *
     * @return Response
     */
    public function actionLogout(): Response
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Signs user up.
     *
     * @return Response
     * @throws \Throwable
     */
    public function actionSignin(): Response
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

                    $confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['/signin-confirm', 'token' => $user->email_confirm_token]); // FIXME: delete before deploy in production!
                    $msg = 'To complete the registration, confirm your email ({email}). Check your email.';
                    $flashMsg = Yii::t('form', $msg, ['email' => '<strong>' . $user->email . '</strong>']);
                    $urlResendToken = Url::toRoute(['/resend-email', 'token' => $user->email_confirm_token]);
                    $flashMsg .= '<br/>' . Html::a(Yii::t('form', 'Resend email'), $urlResendToken);
                    $flashMsg .= '<br/> Или нажмите на ' . Html::a('эту временную ссылку', $confirmLink) . ' для активации =)'; // FIXME: delete before deploy in production!
                    Yii::$app->session->setFlash('warning', $flashMsg);
                    $this->jsonData['flash']['info'][] = $flashMsg;
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
     *
     * @param string $token
     * @return Response
     */
    public function actionSigninConfirm(string $token): Response
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
     * Resend email confirm user.
     *
     * @param string $token
     * @return Response
     */
    public function actionResendEmail(string $token): Response
    {
        /**
         * @var UserEntity $user
         */
        $user = UserEntity::findIdentityByEmailConfirmToken($token);
        $service = new IdentityService();
        $service->sendEmailConfirm($user);
        Yii::$app->session->setFlash('success', Yii::t('form', 'To complete the registration, confirm your email. Check your email.'));
        return $this->goHome();
    }

    /**
     * Requests password reset.
     *
     * @return string|Response
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
     *
     * @param string $token
     * @return string|Response
     * @throws BadRequestHttpException
     * @throws Exception
     */
    public function actionResetPassword(string $token)
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

    /**
     * @param string $token
     */
    public function actionSaveNewPassword(string $token): void
    {

    }
}