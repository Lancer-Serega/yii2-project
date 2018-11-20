<?php
namespace frontend\models\Form;

use frontend\models\Entity\UserEntity;
use Yii;
use yii\base\Exception;

/**
 * Password reset request form.
 *
 * Class PasswordResetRequestForm
 * @package frontend\models\Form
 */
class PasswordResetRequestForm extends BaseForm
{
    public $email;


    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => UserEntity::class,
                'filter' => ['status' => UserEntity::STATUS_ACTIVE],
                'message' => Yii::t('form', 'There is no user with this email address.')
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     * @throws Exception
     */
    public function sendEmail(): bool
    {
        /* @var $user UserEntity */
        $user = UserEntity::findOne([
            'status' => UserEntity::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!UserEntity::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject(Yii::t('form', 'Password reset for {username}', ['username' => Yii::$app->name]))
            ->send();
    }
}
