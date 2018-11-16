<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 14.11.18
 * Time: 19:47
 */

namespace frontend\models\Entity;

/**
 * Class UserNotification
 * @property int $id
 * @property int $user_id [int(11) unsigned] ID user
 * @property string $name [varchar(255)] Notification name
 * @property int $value [tinyint(1)] Notification value
 * @package frontend\models
 */
class UserNotification extends BaseEntity
{
    /**
     * @var User
     */
    public $user;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_notification}}';
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @param int $configId
     * @return UserConfig
     */
    public static function getById(int $configId): UserConfig
    {
        return self::findOne(['id' => $configId]);
    }

    /**
     * @param null|int $languageId
     * @return Language
     */
    public function getLanguage($languageId = null): Language
    {
        if (!$languageId) {
            $languageId = $this->language_id;
        }
        $this->language = Language::getById($languageId);
        $this->language_id = $this->language->id;

        return $this->language;
    }

    /**
     * @param Language $language
     */
    public function setLanguage(Language $language): void
    {
        $this->language = $language;
    }
}