<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 31.10.18
 * Time: 15:33
 */

namespace frontend\services;

use frontend\models\Language;
use frontend\models\UserChangeAccountForm;
use Yii;
use frontend\models\SigninForm;
use frontend\models\User;

class IdentityService
{
    /**
     * Create a new user in the database
     * @param SigninForm $form
     * @return User|null
     * @throws \yii\base\Exception
     * @throws \Exception
     */
    public function signin(SigninForm $form): ?User
    {
        if (!$form->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $form->username;
        $user->email = $form->email;
        $user->email_confirm_token = Yii::$app->security->generateRandomString(32);
        $user->email_status = User::EMAIL_NOT_CONFIRMED;
        $user->status = User::STATUS_ACTIVE;

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
     * @param User $user
     */
    public function sendEmailConfirm(User $user): void
    {
        $email = $user->email;

        $sent = Yii::$app->mailer
            ->compose(
                ['html' => 'user-signup-comfirm-html', 'text' => 'user-signup-comfirm-text'],
                ['user' => $user])
            ->setTo($email)
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setSubject(Yii::t('mail', 'Confirmation of registration'))
            ->send();

        if (!$sent) {
            throw new \RuntimeException(Yii::t('error', 'Sending error.'));
        }
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
     * $user->status = User::STATUS_ACTIVE;
     * ```
     * @param $token
     */
    public function confirmation($token): void
    {
        if (empty($token)) {
            throw new \DomainException('Empty confirm token.');
        }

        $user = User::findOne(['email_confirm_token' => $token]);
        if (!$user) {
            throw new \DomainException('User is not found.');
        }

        $user->email_confirm_token = null;
        $user->status = User::STATUS_ACTIVE;
        $user->email_status = User::EMAIL_CONFIRMED;
        if (!$user->save()) {
            throw new \RuntimeException('Saving error.');
        }

        if (!Yii::$app->getUser()->login($user)){
            throw new \RuntimeException('Error authentication.');
        }
    }

    /**
     * @param UserChangeAccountForm $form
     * @return User|null
     * @throws \Throwable
     * @throws \yii\base\Exception
     */
    public function userChangeAccount(UserChangeAccountForm $form): ?User
    {
        if (!$form->validate()) {
            return null;
        }

        /**
         * @var User $user
         */
        $user = Yii::$app->user->getIdentity();
        $user->language = (int)$form->language;
        !$form->username ?: $user->username = $form->username;
        !$form->phone ?: $user->phone = $form->phone;
        !$form->skype ?: $user->skype = $form->skype;
        !$form->telegram ?: $user->telegram = $form->telegram;
        !$form->new_password ?: $user->setPassword($form->new_password);

        if ($form->language) {
            Language::setCurrentById($user->language);
        }

        try {
            if ($user->save()) {
                return $user;
            }
        } catch (\Exception $e) {
            return null;
        }

        return null;
    }
}