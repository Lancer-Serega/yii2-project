<?php

namespace frontend\models\Form;

use frontend\controllers\BaseController;
use frontend\models\Entity\UserEntity;
use frontend\models\Repository\UserConfigRepository;
use frontend\services\IdentityService;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * LoginForm is the model behind the login form.
 *
 * @property UserEntity|null $user This property is read-only.
 *
 */
class LoginForm extends BaseForm
{
    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

    /**
     * @var bool
     */
    public $remember = true;

    /**
     * @var UserEntity
     */
    private $_user;


    /**
     * @return array the validation rules.
     */
    public function rules(): array
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
     */
    public function validatePassword(string $attribute): void
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('form', 'Incorrect username or password.'));
            }
        }
    }

    /**
     * Finds user by [[email]].
     *
     * @return UserEntity|null
     */
    public function getUser(): ?UserEntity
    {
        if ($this->_user === null) {
            $this->_user = UserEntity::findByEmail($this->email);
        }

        return $this->_user;
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @param BaseController $controller
     * @return bool whether the user is logged in successfully
     * @throws \Exception
     */
    public function login(BaseController $controller): bool
    {
        if (!$this->validate()) {
            return false;
        }

        $user = $this->getUser();
        if (!$user) {
            return false;
        }

        if ($user->email_status === UserEntity::EMAIL_NOT_CONFIRMED) {
            $confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['/signin-confirm', 'token' => $user->email_confirm_token]); // FIXME: delete before deploy in production!
            $msg = 'To complete the registration, confirm your email ({email}). Check your email.';
            $flashMsg = Yii::t('form', $msg, ['email' => '<strong>' . $user->email . '</strong>']);
            $urlResendToken = Url::toRoute(['/resend-email', 'token' => $user->email_confirm_token]);
            $flashMsg .= '<br/>' . Html::a(Yii::t('form', 'Resend email'), $urlResendToken);
            $flashMsg .= '<br/> Или нажмите на ' . Html::a('эту временную ссылку', $confirmLink) . ' для активации =)'; // FIXME: delete before deploy in production!
            Yii::$app->session->setFlash('warning', $flashMsg);

            return true;
        }

        if (UserConfigRepository::getTwoFactorAuth(['two_factor_auth'], $user->getId())) {
            \Yii::$app->session->set('user_id', $user->getId());
            \Yii::$app->session->set('remember', $this->remember);
            $userConfig = $user->getUserConfig();
            $service = new IdentityService();
            $service->sendEmailTwoFactorAuthKey($user, $userConfig->generateTwoFactorAuthKey());
            $controller->redirect('accept-two-factor-auth')->send();
            return true;
        }

        $loggedIn = Yii::$app->user->login($user, $this->remember ? 3600 * 24 * 30 : 0);
        if ($loggedIn) {
            \Yii::info("[success] Is login UserEntity: [id:{$user->getId()}, email:" . $user->email . ']', 'user.auth');
        } else {
            \Yii::error("[error] Is login UserEntity: [id:{$user->getId()}, email:" . $user->email . ']', 'user.auth');
        }

        return $loggedIn;
    }
}
