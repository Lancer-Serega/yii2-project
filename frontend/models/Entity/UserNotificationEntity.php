<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 14.11.18
 * Time: 19:47
 */

namespace frontend\models\Entity;

/**
 * Class UserNotificationEntity
 * @property int $id
 * @property int $user_id [int(11) unsigned] ID user
 * @property string $name [varchar(255)] Notification name
 * @property int $value [tinyint(1)] Notification value
 * @package frontend\models
 */
class UserNotificationEntity extends BaseEntity
{
    /**
     * @var UserEntity
     */
    public $user;

    public $language;

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%user_notification}}';
    }

    /**
     * Get user notification ID
     *
     * @return int|string
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * Get user notification model by ID
     *
     * @param int $configId
     * @return UserNotificationEntity
     */
    public static function getById(int $configId): UserNotificationEntity
    {
        return self::findOne(['id' => $configId]);
    }
}