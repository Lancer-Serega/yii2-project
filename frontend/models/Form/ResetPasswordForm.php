<?php
namespace frontend\models\Form;

use frontend\models\Entity\UserEntity;
use yii\base\Exception;
use yii\base\InvalidArgumentException;

/**
 * Password reset form.
 *
 * Class ResetPasswordForm
 * @package frontend\models\Form
 * @property int $id [int(11) unsigned]
 * @property int $user_config_id [int(11) unsigned]  UserEntity config table ID `user_config`.`id`
 * @property string $username [varchar(255)]  UserEntity name
 * @property string $auth_key [varchar(32)]  Authorization key
 * @property string $password_hash [varchar(255)]  Hash user password
 * @property string $password_reset_token [varchar(255)]  Password reset token
 * @property string $email [varchar(255)]  UserEntity Email
 * @property string $email_confirm_token [varchar(32)]  UserEntity Email confirm token. Need to confirm user email
 * @property bool $email_status [tinyint(1)]  UserEntity Email status (0 => EMAIL_NOT_CONFIRMED, 1 => EMAIL_CONFIRMED). See the full list in the UserEntity model.
 * @property bool $status [tinyint(1)]  UserEntity status (active or deleted)
 * @property int $created_at [timestamp]  UserEntity register date
 * @property int $updated_at [timestamp]  UserEntity update date
 * @property string $phone [varchar(22)]  UserEntity phone
 * @property string $skype [varchar(255)]  UserEntity skype
 * @property string $telegram [varchar(32)]  UserEntity telegram
 */
class ResetPasswordForm extends BaseForm
{
    /**
     * @var string
     */
    public $password;

    /**
     * @var UserEntity
     */
    private $_user;

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 8],
        ];
    }

    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws InvalidArgumentException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !\is_string($token)) {
            throw new InvalidArgumentException(\Yii::t('error', 'Password reset token cannot be blank.'));
        }
        $this->_user = UserEntity::findByPasswordResetToken($token);
        if (!$this->_user) {
            throw new InvalidArgumentException(\Yii::t('error', 'Wrong password reset token.'));
        }
        parent::__construct($config);
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     * @throws Exception
     */
    public function resetPassword(): bool
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();

        return $user->save(false);
    }
}
