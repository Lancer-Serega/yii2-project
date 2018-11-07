<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Signin form
 */
class SigninForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $msg = [
            'required' => Yii::t('form', 'This field is required'),
            'username' => [
                'min' => Yii::t('form', 'The "{field_name}" value must contain at least {min} characters.', ['field_name' => Yii::t('form', 'Your name')]),
                'max' => Yii::t('form', 'The "{field_name}" value must contain a maximum of {max} characters.', ['field_name' => Yii::t('form', 'Your name')]),
            ],
            'email' => [
                'email' => Yii::t('form', ''),
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
            ['email', 'unique', 'targetClass' => User::class, 'message' => $msg['email']['unique']],

            ['password', 'string', 'min' => 8, 'tooShort' => $msg['password']['min']],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => $msg['password_repeat']['compare']],
        ];
    }
}
