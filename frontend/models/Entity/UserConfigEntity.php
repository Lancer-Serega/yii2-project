<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 14.11.18
 * Time: 19:47
 */

namespace frontend\models\Entity;

use frontend\models\Repository\UserConfigRepository;

/**
 * Class UserConfigEntity.
 * 
 * @property int $id
 * @property int $language_id [int(11) unsigned]  ID language on language table
 * @property bool $two_factor_auth [tinyint(1)]  Check two-factor authorization
 * @property string $two_factor_auth_key [varchar(32)]  Key for two-factor authorization
 * @package frontend\models
 */
class UserConfigEntity extends BaseEntity
{
    /**
     * @var LanguageEntity
     */
    public $language;

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%user_config}}';
    }

    /**
     * Get user config id.
     * 
     * @return int|string
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * Get user config model by user config ID.
     * 
     * @param int $configId
     * @return UserConfigEntity
     */
    public static function getById(int $configId): UserConfigEntity
    {
        return self::findOne(['id' => $configId]);
    }

    /**
     * Get language model by language ID.
     * 
     * @param null|int $languageId
     * @return LanguageEntity
     */
    public function getLanguage($languageId = null): LanguageEntity
    {
        if (!$languageId) {
            $languageId = $this->language_id;
        }
        $this->language = LanguageEntity::getById($languageId);
        $this->language_id = $this->language->id;

        return $this->language;
    }

    /**
     * Set language model.
     * 
     * @param LanguageEntity $language
     */
    public function setLanguage(LanguageEntity $language): void
    {
        $this->language = $language;
    }

    /**
     * Get two-factor authorization key.
     * 
     * @return string
     */
    public function getTwoFactorAuthKey(): string
    {
        return $this->two_factor_auth_key;
    }

    /**
     * Set two-factor authorization key.
     * 
     * @param string $twoFactorAuthKey
     * @return UserConfigEntity
     */
    public function setTwoFactorAuthKey(string $twoFactorAuthKey): UserConfigEntity
    {
        $this->two_factor_auth_key = $twoFactorAuthKey;
        return $this;
    }

    /**
     * Get two-factor authorization.
     * 
     * @return bool
     */
    public function getTwoFactorAuth(): bool
    {
        return $this->two_factor_auth;
    }

    /**
     * Set two-factor authorization.
     * 
     * @param bool $twoFactorAuth
     * @return UserConfigEntity
     */
    public function setTwoFactorAuth(bool $twoFactorAuth): UserConfigEntity
    {
        $this->two_factor_auth = $twoFactorAuth;
        return $this;
    }

    /**
     * Get language ID.
     * 
     * @return int
     */
    public function getLanguageId(): int
    {
        return $this->language_id;
    }

    /**
     * Set language ID.
     *
     * @param int $languageId
     * @return UserConfigEntity
     */
    public function setLanguageId($languageId): UserConfigEntity
    {
        $this->language_id = $languageId;
        return $this;
    }

    /**
     * Generate two-factor authorization key with saving in database.
     *
     * @return string
     * @throws \Exception
     */
    public function generateTwoFactorAuthKey(): string
    {
        $this->setTwoFactorAuthKey(UserConfigRepository::generateTwoFactorAuthKey())->save();
        return $this->getTwoFactorAuthKey();
    }
}