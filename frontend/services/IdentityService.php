<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 31.10.18
 * Time: 15:33
 */

namespace frontend\services;

use frontend\models\Entity\LanguageEntity;
use frontend\models\Form\UserChangeAccountForm;
use frontend\models\Entity\UserConfigEntity;
use frontend\models\Repository\UserConfigRepository;
use Yii;
use frontend\models\Form\SigninForm;
use frontend\models\Entity\UserEntity;
use yii\base\Exception;

class IdentityService
{
    /**
     * Create a new user in the database
     *
     * @param SigninForm $form
     * @return UserEntity|null
     * @throws \Throwable
     * @throws Exception
     */
    public function signin(SigninForm $form): ?UserEntity
    {
        if (!$form->validate()) {
            return null;
        }

        $userConfig = new UserConfigEntity();
        $userConfig->language_id = LanguageEntity::getCurrent()->id;
        $userConfig->save();

        $user = new UserEntity();
        $user->username = $form->username;
        $user->email = $form->email;
        $user->email_confirm_token = Yii::$app->security->generateRandomString(32);
        $user->email_status = UserEntity::EMAIL_NOT_CONFIRMED;
        $user->status = UserEntity::STATUS_ACTIVE;
        $user->user_config_id = $userConfig->getId();

        $user->setPassword($form->password);
        $user->generateAuthKey();

        if ($user->save()) {
            $auth = Yii::$app->authManager;
            $auth->assign($auth->getRole(RbacService::ROLE_USER), $user->getId());

            return $user;
        }

        return null;
    }

    /**
     * Sends a letter to the registering user with a link to confirm registration
     *
     * @param UserEntity $user
     */
    public function sendEmailConfirm(UserEntity $user): void
    {
        $email = $user->email;

        $sent = Yii::$app->mailer
            ->compose(
                ['html' => 'user-signin-confirm-html', 'text' => 'user-signin-confirm-text'],
                ['user' => $user])
            ->setTo($email)
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setSubject(Yii::t('mail', 'Confirmation of registration'))
            ->send();

        if (!$sent) {
            $msg = '[error] Is send confirm registration.';
            $msg .= "UserEntity: [id:{$user->getId()}, email:" . $user->email . ']';
            \Yii::error($msg, 'user.send_confirm_registration');
            throw new \RuntimeException(Yii::t('error', 'Sending error.'));
        }
        $msg = '[success] Is send confirm registration.';
        $msg .= "UserEntity: [id:{$user->getId()}, email:" . $user->email . ']';
        \Yii::info($msg, 'user.send_confirm_registration');
    }

    /**
     * Sends a letter to a user when two-factor authentication is enabled with a link to confirm login.
     *
     * @param UserEntity $user
     * @param string $twoFactorAuthKey
     */
    public function sendEmailTwoFactorAuthKey(UserEntity $user, string $twoFactorAuthKey): void
    {
        $email = $user->email;

        $sent = Yii::$app->mailer
            ->compose(
                ['html' => 'user-login-confirm-html', 'text' => 'user-login-confirm-text'],
                ['user' => $user, 'twoFactorAuthKey' => $twoFactorAuthKey])
            ->setTo($email)
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setSubject(Yii::t('form', 'Login confirmation'))
            ->send();

        if (!$sent) {
            $msg = '[error] Is send two-factor auth key.';
            $msg .= "UserEntity: [id:{$user->getId()}, email:" . $user->email . ']';
            \Yii::error($msg, 'user.send_two_factor_key');
            throw new \RuntimeException(Yii::t('error', 'Sending error.'));
        }

        $msg = '[success] Is send two-factor auth key.';
        $msg .= "UserEntity: [id:{$user->getId()}, email:" . $user->email . ']';
        \Yii::info($msg, 'user.send_two_factor_key');
    }

    /**
     * Used to verify the token when the user clicks the confirmation link
     * (the link will contain this parameter, which will be found in the database).
     * If the token is valid, then the email_confirm_token field is cleared:
     * ```php
     * $user->email_confirm_token = null;
     * ```
     * and the user gets the status 'active':
     * ```php
     * $user->status = UserEntity::STATUS_ACTIVE;
     * ```
     * @param string $token
     */
    public function confirmation(string $token): void
    {
        if (empty($token)) {
            throw new \DomainException(Yii::t('error', 'Empty confirm token.'));
        }

        $user = UserEntity::findOne(['email_confirm_token' => $token]);
        if (!$user) {
            throw new \DomainException(Yii::t('error', 'UserEntity is not found.'));
        }

        $user->email_confirm_token = null;
        $user->status = UserEntity::STATUS_ACTIVE;
        $user->email_status = UserEntity::EMAIL_CONFIRMED;
        if (!$user->save()) {
            throw new \RuntimeException(Yii::t('error', 'Saving error.'));
        }

        if (!Yii::$app->getUser()->login($user)){
            throw new \RuntimeException(Yii::t('error', 'Error authentication.'));
        }
    }

    /**
     * User save account info.
     *
     * @param UserChangeAccountForm $form
     * @return UserEntity|null
     * @throws \Throwable
     * @throws Exception
     */
    public function userChangeAccount(UserChangeAccountForm $form): ?UserEntity
    {
        if (!$form->validate()) {
            return null;
        }

        /**
         * @var UserEntity $user
         */
        $user = Yii::$app->user->getIdentity();
        $userConfig = $user->getUserConfig();
        $userConfig->language_id = (int)$form->language;

        !$form->username ?: $user->username = $form->username;
        !$form->phone ?: $user->phone = $form->phone;
        !$form->skype ?: $user->skype = $form->skype;
        !$form->telegram ?: $user->telegram = $form->telegram;
        !$form->new_password ?: $user->setPassword($form->new_password);

        $user->switchLanguage(LanguageEntity::getById($form->language));

        try {
            if ($userConfig->save()) {
                $user->userConfig = $userConfig;
                $user->user_config_id = $userConfig->id;
                if ($user->save()) {
                    return $user;
                }
            }
        } catch (\Exception $e) {
            return null;
        }

        return null;
    }

    /**
     * Two-factor authentication key verification.
     *
     * @param int $userId
     * @param string $twoFactorAuthKey
     * @return bool
     */
    public function checkTwoFactorAuthKey(int $userId, string $twoFactorAuthKey): bool
    {
        $remember = \Yii::$app->session->get('remember');
        $user = UserEntity::findIdentity($userId);
        if (!$user) {
            return false;
        }

        $isValidKey = UserConfigRepository::checkTwoFactorAuthKey($userId, $twoFactorAuthKey);
        if (!$isValidKey) {
            return false;
        }

        $loggedIn = Yii::$app->user->login($user,  $remember ? 3600 * 24 * 30 : 0);
        if ($loggedIn) {
            \Yii::info("[success] Is login UserEntity: [id:{$user->getId()}, email:" . $user->email . ']', 'user.auth');
        } else {
            \Yii::error("[error] Is login UserEntity: [id:{$user->getId()}, email:" . $user->email . ']', 'user.auth');
        }

        return $loggedIn;
    }
}