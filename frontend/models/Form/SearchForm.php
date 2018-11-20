<?php

namespace frontend\models\Form;

use Yii;

/**
 * Class SearchForm
 * @package frontend\models\Form
 * @property int $id [int(11) unsigned]
 * @property int $user_config_id [int(11) unsigned]  User config table ID `user_config`.`id`
 * @property string $username [varchar(255)]  User name
 * @property string $auth_key [varchar(32)]  Authorization key
 * @property string $password_hash [varchar(255)]  Hash user password
 * @property string $password_reset_token [varchar(255)]  Password reset token
 * @property string $email [varchar(255)]  User Email
 * @property string $email_confirm_token [varchar(32)]  User Email confirm token. Need to confirm user email
 * @property bool $email_status [tinyint(1)]  User Email status (0 => EMAIL_NOT_CONFIRMED, 1 => EMAIL_CONFIRMED). See the full list in the User model.
 * @property bool $status [tinyint(1)]  User status (active or deleted)
 * @property int $created_at [timestamp]  User register date
 * @property int $updated_at [timestamp]  User update date
 * @property string $phone [varchar(22)]  User phone
 * @property string $skype [varchar(255)]  User skype
 * @property string $telegram [varchar(32)]  User telegram
 * @property string $login [varchar(255)]  User login
 */
class SearchForm extends BaseForm
{
    /**
     * @var string
     */
    public static $search;

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%user}}';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        $msg = [
            'required' => Yii::t('form', 'This field is required'),
            'search' => [
                'min' => Yii::t('form', 'The "Password" value must contain at least {min} characters.'),
                'max' => Yii::t('form', 'The "Email" value must contain a maximum of {max} characters.'),
            ],
        ];

        return [
            [['search'], 'trim'],
            ['search', 'string', 'min' => 2, 'max' => 255, 'tooShort' => $msg['search']['min'], 'tooLong' => $msg['search']['max']],
        ];
    }
}
