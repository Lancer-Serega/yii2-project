<?php

namespace frontend\models\Form;

use frontend\models\Entity\User;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends BaseForm
{
    public $email;
    public $password;
    public $remember = true;

    private $_user;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        $msg = [
            'email' => [
                'email' => Yii::t('form', 'Invalid email address. Example: email@example.com'),
                'max' => Yii::t('form', 'The "Email" value must contain a maximum of {max} characters.'),
            ],
            'password' => [
                'min' => Yii::t('form', 'The "Password" value must contain at least {min} characters.'),
            ],
        ];

        return [
            // username and password are both required
            [['email', 'password'], 'trim'],
            [['email', 'password'], 'required'],
            ['email', 'email', 'message' => $msg['email']['email']],
            ['email', 'string', 'max' => 255, 'tooLong' => $msg['email']['max']],
            ['password', 'string', 'min' => 8, 'tooShort' => $msg['password']['min']],

            // rememberMe must be a boolean value
            ['remember', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('form', 'Incorrect username or password.'));
            }
        }
    }

    /**
     * Finds user by [[email]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = $this->getUser();
        if (!$user) {
            return false;
        }

        if ($user->email_status === User::EMAIL_NOT_CONFIRMED) {
            $flashMsg = Yii::t('form', 'To complete the registration, confirm your email ({email}). Check your email.', ['email' => '<strong>' . $user->email . '</strong>']);
            $urlResendToken = Url::toRoute(['/resend-email', 'token' => $user->email_confirm_token]);
            $flashMsg .= '<br/>' . Html::a(Yii::t('form', 'Resend email'), $urlResendToken);

            $confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['/signin-confirm', 'token' => $user->email_confirm_token]); // FIXME: delete before deploy in production!
            $flashMsg .= '<br/> Или нажмите на ' . Html::a('эту временную ссылку', $confirmLink) . ' для активации =)'; // FIXME: delete before deploy in production!

            Yii::$app->session->setFlash('warning', $flashMsg);
            return true;
        }

        return Yii::$app->user->login($user, $this->remember ? 3600 * 24 * 30 : 0);
    }
}
