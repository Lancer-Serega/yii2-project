<?php
namespace frontend\models\Entity;

use Yii;
use yii\base\Exception;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username User name
 * @property string $auth_key
 * @property string $password_hash Hash user password
 * @property string $password_reset_token Password reset token
 * @property string $email User Email
 * @property string $email_confirm_token User Email confirm token. Need to confirm user email
 * @property int $email_status User Email status (0 => EMAIL_NOT_CONFIRMED, 1 => EMAIL_CONFIRMED). See the full list in the User model.
 * @property int $status User status (active or deleted)
 * @property string $created_at User register date
 * @property string $updated_at User update date
 * @property int $phone [int(22) unsigned]  User phone
 * @property string $skype [varchar(255)]  User skype
 * @property string $telegram [varchar(32)]  User telegram
 * @property string $login [varchar(255)]  User login
 * @property int $user_config_id
 */
class User extends BaseEntity implements IdentityInterface
{
    public const STATUS_DELETED = 0;
    public const STATUS_ACTIVE = 1;

    public const EMAIL_NOT_CONFIRMED = 0;
    public const EMAIL_CONFIRMED = 1;

    /**
     * @var UserConfig
     */
    public $userConfig;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email'], 'required'],
            [['email_status', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key', 'email_confirm_token'], 'string', 'max' => 32],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['email_confirm_token'], 'unique'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            ['email_status', 'default', 'value' => self::EMAIL_NOT_CONFIRMED],
            ['email_status', 'in', 'range' => [self::EMAIL_NOT_CONFIRMED, self::EMAIL_CONFIRMED]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'email_confirm_token' => 'Email Confirm Token',
            'email_status' => 'Email Status',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id, $status = self::STATUS_ACTIVE)
    {
        return static::findOne(['id' => $id, 'status' => $status]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByEmailConfirmToken($token, $status = self::STATUS_ACTIVE)
    {
        return static::findOne(['email_confirm_token' => $token, 'status' => $status]);
    }

    /**
     * @inheritdoc
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @param int $status
     * @return static|null
     */
    public static function findByUsername($username, $status = self::STATUS_ACTIVE)
    {
        return static::findOne(['username' => $username, 'status' => $status]);
    }

    /**
     * Finds user by email
     *
     * @param $email
     * @param int $status
     * @return static|null
     */
    public static function findByEmail($email, $status = self::STATUS_ACTIVE)
    {
        return static::findOne(['email' => $email, 'status' => $status]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     * @throws Exception
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     * @param int $length
     * @throws Exception
     */
    public function generateAuthKey($length = 32)
    {
        $this->auth_key = Yii::$app->security->generateRandomString($length);
    }

    /**
     * Find by password reset token and user status
     * @param string $token
     * @param int $status
     * @return User|null
     */
    public static function findByPasswordResetToken($token, $status = self::STATUS_ACTIVE)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => $status,
        ]);
    }

    /**
     * Check password reset token for validity
     * @param string $token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {

        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * Generate password reset token
     * @throws Exception
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Remove password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @return Language|null
     */
    public function getLanguage()
    {
        $userConfig = $this->getUserConfig();
        return Language::findOne(['id' => $userConfig->language_id]);
    }

    /**
     * @param Language $language
     * @return User
     */
    public function switchLanguage(Language $language): User
    {
        $userConfig = $this->getUserConfig();
        $userConfig->language_id = $language->id;
        $userConfig->save();
        Language::setCurrentById($userConfig->language_id);
        return $this;
    }

    /**
     * @param null $configId
     * @return UserConfig
     */
    public function getUserConfig($configId = null): UserConfig
    {
        if (!$configId) {
            $configId = $this->user_config_id;
        }

        $this->userConfig = UserConfig::getById($configId);
        $this->user_config_id = $this->userConfig->id;
        return $this->userConfig;
    }

    /**
     * @param UserConfig $userConfig
     */
    public function setUserConfig(UserConfig $userConfig): void
    {
        $this->userConfig = $userConfig;
    }
}