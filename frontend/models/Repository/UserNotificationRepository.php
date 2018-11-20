<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 19.11.18
 * Time: 12:48
 */

namespace frontend\models\Repository;

use yii\db\Query;

/**
 * Class UserNotificationRepository
 * @package frontend\models\Repository
 */
class UserNotificationRepository extends BaseRepository
{
    /**
     * Get user notification data by user ID.
     *
     * @param int $userId
     * @return array
     */
    public static function getByUser(int $userId): array
    {
        $query = new Query();
        $result = $query
            ->select(['user_id' => $userId])
            ->from('{{%user_notification}}')
            ->all();

        return $result;
    }

    /**
     * Get user notification data by user ID and notification name.
     *
     * @param int $userId
     * @param string $notificationName
     * @return array
     */
    public static function getByUserAndName(int $userId, string $notificationName): array
    {
        $query = new Query();
        $result = $query
            ->select(['user_id' => $userId, 'name' => $notificationName])
            ->from('{{%user_notification}}')
            ->one();

        return $result;
    }
}