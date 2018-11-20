<?php

namespace frontend\models\Form;

use frontend\models\Entity\UserEntity;
use Yii;

/**
 * Signin form.
 *
 * Class SigninForm
 * @package frontend\models\Form
 */
class SigninForm extends BaseForm
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;

    /**
     * @return array
     */
    public function rules(): array
    {
        $msg = [
            'required' => Yii::t('form', 'This field is required'),
            'username' => [
                'min' => Yii::t('form', 'The "{field_name}" value must contain at least {min} characters.', ['field_name' => Yii::t('form', 'Your name')]),
                'max' => Yii::t('form', 'The "{field_name}" value must contain a maximum of {max} characters.', ['field_name' => Yii::t('form', 'Your name')]),
            ],
            'email' => [
                'email' => Yii::t('form', 'Invalid email address. Example: email@example.com'),
                'max' => Yii::t('form', 'The "Email" value must contain a maximum of {max} characters.'),
                'unique' => Yii::t('form', 'This email address has already been taken.'),
            ],
            'password' => [
                'min' => Yii::t('form', 'The "Password" value must contain at least {min} characters.'),
            ],
            'password_repeat' => [
                'compare' => Yii::t('form', 'Passwords don\'t match'),
            ],
        ];

        return [
            [['username', 'email'], 'trim'],
            [['username', 'email', 'password', 'password_repeat'], 'required', 'message' => $msg['required']],

            ['username', 'string', 'min' => 2, 'max' => 255, 'tooShort' => $msg['username']['min'], 'tooLong' => $msg['username']['max']],

            ['email', 'email', 'message' => $msg['email']['email']],
            ['email', 'string', 'max' => 255, 'tooLong' => $msg['email']['max']],
            ['email', 'uniqueEmailValidator'],

            ['password', 'string', 'min' => 8, 'tooShort' => $msg['password']['min']],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => $msg['password_repeat']['compare']],
        ];
    }

    /**
     * Validator check unique email.
     *
     * @param $attribute
     */
    public function uniqueEmailValidator($attribute): void
    {
        $user = UserEntity::findOne(['email' => $this->email]);
        if ($user) {
            $this->addError($attribute, Yii::t('form', 'This email address has already been taken.'));
        }
    }
}
