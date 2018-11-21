<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 21.11.18
 * Time: 12:34
 */

namespace frontend\models\Repository;

use frontend\models\Entity\NotificationEntity;
use frontend\models\Entity\NotificationUserEntity;

/**
 * Class NotificationUserRepository
 * @package frontend\models\Repository
 */
class NotificationUserRepository extends BaseRepository
{
    /**
     * Change user notification by name
     *
     * @param int $userId
     * @param string $notificationName
     * @param bool $notificationValue
     * @return bool
     */
    public static function changeNotification(int $userId, string $notificationName, bool $notificationValue): bool
    {
        $notification = NotificationEntity::findOne([
            'type' => NotificationEntity::TYPE_USER_SETTING_NOTIFICATION,
            'name' => $notificationName
        ]);
        if (!$notification) {
            $msg = \Yii::t('error', 'Attempt to change non-existent notification!');
            throw new \RuntimeException(\Yii::t('error', $msg));
        }

        $notificationUser = NotificationUserEntity::findOne([
            'user_id' => $userId,
            'notification_id' => $notification->id,
        ]);
        if (!$notificationUser) {
            $notificationUser = new NotificationUserEntity();
            $notificationUser->user_id = $userId;
            $notificationUser->notification_id = $notification->id;
        }
        $notificationUser->value = $notificationValue;

        return $notificationUser->save();
    }
}