<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 21.11.18
 * Time: 12:34
 */

namespace frontend\models\Entity;

/**
 * Class NotificationUserEntity
 * @package frontend\models\Entity
 * @property int $id [int(11) unsigned]
 * @property int $user_id [int(11) unsigned]  UserEntity unique identifier
 * @property int $notification_id [int(11) unsigned]  Notification ID
 * @property bool $value [tinyint(1)]  Notification value
 */
class NotificationUserEntity extends BaseEntity
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%notification_user}}';
    }
}