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
 * @property string $username UserEntity name
 * @property string $auth_key
 * @property string $password_hash Hash user password
 * @property string $password_reset_token Password reset token
 * @property string $email UserEntity Email
 * @property string $email_confirm_token UserEntity Email confirm token. Need to confirm user email
 * @property int $email_status UserEntity Email status (0 => EMAIL_NOT_CONFIRMED, 1 => EMAIL_CONFIRMED). See the full list in the UserEntity model.
 * @property int $status UserEntity status (active or deleted)
 * @property string $created_at UserEntity register date
 * @property string $updated_at UserEntity update date
 * @property int $phone [int(22) unsigned]  UserEntity phone
 * @property string $skype [varchar(255)]  UserEntity skype
 * @property string $telegram [varchar(32)]  UserEntity telegram
 * @property string $login [varchar(255)]  UserEntity login
 * @property int $user_config_id
 */
class UserEntity extends BaseEntity implements IdentityInterface
{
    public const STATUS_DELETED = 0;
    public const STATUS_ACTIVE = 1;

    public const EMAIL_NOT_CONFIRMED = 0;
    public const EMAIL_CONFIRMED = 1;

    /**
     * @var UserConfigEntity
     */
    public $userConfig;

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
     * Find identity
     *
     * @param int|string $id
     * @param int $status
     * @return UserEntity|null|IdentityInterface
     */
    public static function findIdentity($id, int $status = self::STATUS_ACTIVE): ?UserEntity
    {
        return static::findOne(['id' => $id, 'status' => $status]);
    }

    /**
     * Find identity by email confirm token
     *
     * @param $token
     * @param int $status
     * @return UserEntity|null
     */
    public static function findIdentityByEmailConfirmToken(string $token, int $status = self::STATUS_ACTIVE): ?UserEntity
    {
        return static::findOne(['email_confirm_token' => $token, 'status' => $status]);
    }

    /**
     * Find identity by access token
     *
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
    public static function findByUsername(string $username, int $status = self::STATUS_ACTIVE): ?UserEntity
    {
        return static::findOne(['username' => $username, 'status' => $status]);
    }

    /**
     * Finds user by email
     *
     * @param $email
     * @param int $status
     * @return UserEntity|null
     */
    public static function findByEmail(string $email, int $status = self::STATUS_ACTIVE): ?UserEntity
    {
        return static::findOne(['email' => $email, 'status' => $status]);
    }

    /**
     * Get user ID
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * Get user auth key
     *
     * @return string
     */
    public function getAuthKey(): string
    {
        return $this->auth_key;
    }

    /**
     * Validate user auth key
     *
     * @param string $authKey
     * @return bool
     */
    public function validateAuthKey($authKey): bool
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword(string $password): bool
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     * @return UserEntity
     * @throws Exception
     */
    public function setPassword(string $password): UserEntity
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
        return $this;
    }

    /**
     * Generates "remember me" authentication key
     *
     * @param int $length
     * @return string
     * @throws Exception
     */
    public function generateAuthKey(int $length = 32): string
    {
        $this->auth_key = Yii::$app->security->generateRandomString($length);
        return $this->auth_key;
    }

    /**
     * Find by password reset token and user status
     *
     * @param string $token
     * @param int $status
     * @return UserEntity|null
     */
    public static function findByPasswordResetToken(string $token, int $status = self::STATUS_ACTIVE): ?UserEntity
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
     *
     * @param string|null $token
     * @return bool
     */
    public static function isPasswordResetTokenValid(?string $token): bool
    {
        if ($token === null) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * Generate password reset token
     *
     * @return string
     * @throws Exception
     */
    public function generatePasswordResetToken(): string
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
        return $this->password_reset_token;
    }

    /**
     * Remove password reset token
     */
    public function removePasswordResetToken(): void
    {
        $this->password_reset_token = null;
    }

    /**
     * Get user language interface
     *
     * @return LanguageEntity|null
     */
    public function getLanguage(): ?LanguageEntity
    {
        $userConfig = $this->getUserConfig();
        return LanguageEntity::findOne(['id' => $userConfig->language_id]);
    }

    /**
     * Switch user language interface
     *
     * @param LanguageEntity $language
     * @return UserEntity
     */
    public function switchLanguage(LanguageEntity $language): UserEntity
    {
        $userConfig = $this->getUserConfig();
        $userConfig->language_id = $language->id;
        $userConfig->save();
        LanguageEntity::setCurrentById($userConfig->language_id);
        return $this;
    }

    /**
     * Get user config model
     *
     * @param int|null $configId
     * @return UserConfigEntity
     */
    public function getUserConfig(int $configId = null): UserConfigEntity
    {
        if (!$configId) {
            $configId = $this->user_config_id;
        }

        $this->userConfig = UserConfigEntity::getById($configId);
        $this->user_config_id = $this->userConfig->id;
        return $this->userConfig;
    }

    /**
     * Set user config model
     *
     * @param UserConfigEntity $userConfig
     */
    public function setUserConfig(UserConfigEntity $userConfig): void
    {
        $this->userConfig = $userConfig;
    }
}