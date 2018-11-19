<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 19.11.18
 * Time: 12:48
 */

namespace frontend\models\Repository;


use yii\db\Query;

class UserNotificationRepository extends BaseRepository
{

    public static function getByUser(int $user_id): array
    {
        $query = new Query();
        $result = $query
            ->select(['user_id' => $user_id])
            ->from('{{%user_notification}}')
            ->all();

        return $result;
    }

    public static function getByUserAndName(int $user_id, string $notificationName): array
    {
        $query = new Query();
        $result = $query
            ->select(['user_id' => $user_id, 'name' => $notificationName])
            ->from('{{%user_notification}}')
            ->one();

        return $result;
    }
}