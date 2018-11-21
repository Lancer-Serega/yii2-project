<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 21.11.18
 * Time: 12:34
 */

namespace frontend\models\Entity;

/**
 * Class NotificationEntity
 * @package frontend\models\Entity
 * @property int $id [int(11) unsigned]
 * @property string $type [varchar(255)]  Notification type.
 * @property string $name [varchar(255)]  Notification name.
 * @property string $description Notification description.
 */
class NotificationEntity extends BaseEntity
{
    public const TYPE_USER_SETTING_NOTIFICATION = 'user.setting.notification';

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%notification}}';
    }
}