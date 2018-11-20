<?php

namespace frontend\models\Form;

use Yii;

/**
 * LoginForm is the model behind the login form.
 *
 * Class UserChangeAccountForm
 * @package frontend\models\Form
 */
class UserChangeAccountForm extends BaseForm
{
    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $new_password;

    /**
     * @var string
     */
    public $password_repeat;

    /**
     * @var string
     */
    public $language;

    /**
     * @var int
     */
    public $phone;

    /**
     * @var string
     */
    public $skype;

    /**
     * @var string
     */
    public $telegram;


    /**
     * @return array the validation rules.
     */
    public function rules(): array
    {
        $msg = [
            'required' => Yii::t('form', '"{field_name}" field is required', ['field_name' => Yii::t('form', 'Your name')]),
            'pattern' => Yii::t('form', 'Invalid characters are present.') . Yii::t('form', 'Only Latin letters, numbers and underscores are allowed.'),

            'username' => [
                'min' => Yii::t('form', 'The "{field_name}" value must contain at least {min} characters.', ['field_name' => Yii::t('form', 'Your name')]),
                'max' => Yii::t('form', 'The "{field_name}" value must contain a maximum of {max} characters.', ['field_name' => Yii::t('form', 'Your name')]),
            ],
            'new_password' => [
                'min' => Yii::t('form', 'The "{field_name}" value must contain at least {min} characters.', ['field_name' => Yii::t('form', 'New password')]),
            ],
            'password_repeat' => [
                'min' => Yii::t('form', 'The "{field_name}" value must contain at least {min} characters.', ['field_name' => Yii::t('form', 'Repeat password')]),
                'compare' => Yii::t('form', 'Passwords don\'t match'),
            ],
            'language' => [
                'validate' => Yii::t('form', 'The selected interface language is currently not available. Select another language from the list.'),
            ],
            'phone' => [
                'validate' => Yii::t('form', 'Phone is not in the correct format. Enter the phone in the format {phone_example}', ['phone_example' => 12223334455]),
                'min' => Yii::t('form', 'The "{field_name}" value must contain at least {min} characters.', ['field_name' => Yii::t('form', 'Your phone')]),
                'max' => Yii::t('form', 'The "{field_name}" value must contain a maximum of {max} characters.', ['field_name' => Yii::t('form', 'Your phone')]),
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
            ['username', 'required', 'message' => $msg['required']],
            [['username', 'new_password', 'password_repeat', 'language', 'phone', 'skype', 'telegram'], 'trim'],
            ['username', 'string', 'min' => 2, 'max' => 255, 'tooShort' => $msg['username']['min'], 'tooLong' => $msg['username']['max']],
            ['new_password', 'string', 'min' => 8, 'tooShort' => $msg['new_password']['min']],
            ['password_repeat', 'string', 'min' => 8, 'tooShort' => $msg['password_repeat']['min']],
            ['password_repeat', 'compare', 'compareAttribute' => 'new_password', 'message' => $msg['password_repeat']['compare']],
            ['phone', 'number', 'message' => $msg['phone']['validate']],
            ['phone', 'string', 'min' => 11, 'max' => 22, 'tooShort' => $msg['phone']['min'], 'tooLong' => $msg['phone']['max']],
            ['skype', 'string', 'min' => 5, 'max' => 255, 'tooShort' => $msg['skype']['min'], 'tooLong' => $msg['skype']['max']],
            ['telegram', 'string', 'min' => 5, 'max' => 32, 'tooShort' => $msg['telegram']['min'], 'tooLong' => $msg['telegram']['max']],
            [['skype', 'telegram'], 'match', 'pattern'=>'/^[\w_\d]+$/', 'message' => $msg['pattern']],
        ];
    }
}
