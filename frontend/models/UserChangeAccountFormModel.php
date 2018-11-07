<?php

namespace frontend\models;

use borales\extensions\phoneInput\PhoneInputBehavior;
use borales\extensions\phoneInput\PhoneInputValidator;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class UserChangeAccountFormModel extends Model
{
    public $username;
    public $new_password;
    public $password_repeat;
    public $lang;
    public $phone;
    public $skype;
    public $telegram;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        $msg = [
            'required' => Yii::t('form', 'This field is required'),
            'pattern' => Yii::t('form', 'Invalid characters are present.') . Yii::t('form', 'Only Latin letters, numbers and underscores are allowed.'),

            'username' => [
                'min' => Yii::t('form', 'The "{field_name}" value must contain at least {min} characters.', ['field_name' => Yii::t('form', 'Your name')]),
                'max' => Yii::t('form', 'The "{field_name}" value must contain a maximum of {max} characters.', ['field_name' => Yii::t('form', 'Your name')]),
            ],
            'new_password' => [
                'min' => Yii::t('form', 'The "{field_name}" value must contain at least {min} characters.', ['field_name' => 'New password']),
            ],
            'password_repeat' => [
                'compare' => Yii::t('form', 'Passwords don\'t match'),
            ],
            'lang' => [
                'validate' => Yii::t('form', 'The selected interface language is currently not available. Select another language from the list.'),
            ],
            'phone' => [
                'range' => Yii::t('form', 'I the "{field_name}" characters must be in the range from {min} to {max}.', ['field_name' => Yii::t('form', 'Phone')]),
                'validate' => Yii::t('form', 'Phone is not in the correct format. Enter the phone in the format {phone_example}', ['phone_example' => 12223334455])
            ],
            'skype' => [
                'match' => Yii::t('form', 'The "{field_name}" value must contain at least {min} characters.', ['field_name' => Yii::t('form', 'Skype')]),

                'min' => Yii::t('form', 'The "{field_name}" value must contain at least {min} characters.', ['field_name' => Yii::t('form', 'Your skype')]),
                'max' => Yii::t('form', 'The "{field_name}" value must contain a maximum of {max} characters.', ['field_name' => Yii::t('form', 'Your skype')]),
            ],
            'telegram' => [
                'match' => Yii::t('form', 'The "{field_name}" value must contain a maximum of {max} characters.', ['field_name' => Yii::t('form', 'Telegram')]),
                'min' => Yii::t('form', 'The "{field_name}" value must contain at least {min} characters.', ['field_name' => Yii::t('form', 'Your telegram')]),
                'max' => Yii::t('form', 'The "{field_name}" value must contain a maximum of {max} characters.', ['field_name' => Yii::t('form', 'Your telegram')]),
            ],
        ];

        return [
            ['username', 'required'],
            [['username', 'new_password', 'password_repeat', 'lang', 'phone', 'skype', 'telegram'], 'trim'],
            ['username', 'string', 'min' => 2, 'max' => 255, 'tooShort' => $msg['username']['min'], 'tooLong' => $msg['username']['max']],
            ['new_password', 'string', 'min' => 8, 'tooShort' => $msg['new_password']['min']],
            ['password_repeat', 'compare', 'compareAttribute' => 'new_password', 'message' => $msg['password_repeat']['compare']],
            ['phone', 'number', 'min' => 11, 'max' => 22, 'message' => $msg['phone']['range']],
            ['skype', 'string', 'min' => 5, 'max' => 255, 'tooShort' => $msg['skype']['min'], 'tooLong' => $msg['skype']['max']],
            ['telegram', 'string', 'min' => 5, 'max' => 32, 'tooShort' => $msg['telegram']['min'], 'tooLong' => $msg['telegram']['max']],
            [['skype', 'telegram'], 'match', 'pattern'=>'/^[\w_\d]+$/', 'message' => $msg['pattern']],
        ];
    }

    public function behaviors()
    {
        return [
            'phoneInput' => PhoneInputBehavior::class,
        ];
    }
}
