<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 19.11.18
 * Time: 12:48
 */

namespace frontend\models\Repository;


use frontend\models\Entity\User;
use frontend\models\Entity\UserConfig;
use yii\db\Exception;
use yii\db\Query;

class UserConfigRepository extends BaseRepository
{
    /**
     * @param array $select
     * @param array $where
     * @return array
     */
    public static function getAll(array $select, array $where): array
    {
        $query = new Query();
        $result = $query
            ->select($select)
            ->from(UserConfig::tableName())
            ->where($where)
            ->all();

        return $result;
    }

    /**
     * @param array $select
     * @param int $userId
     * @return bool
     */
    public static function getTwoFactorAuth(array $select, int $userId): bool
    {
        $query = new Query();
        $userConfig = $query
            ->select('user_config_id')
            ->from(User::tableName())
            ->where(['id' => $userId])
            ->one();
        if (empty($userConfig)) {
            return false;
        }

        $result = $query
            ->select($select)
            ->from(UserConfig::tableName())
            ->where(['id' => $userConfig['user_config_id']])
            ->one();
        if (empty($result)) {
            return false;
        }

        return (bool)$result['two_factor_auth'];
    }

    /**
     * @param int $userId
     * @param bool $twoFactorAuth
     * @return bool
     */
    public static function setTwoFactorAuth(int $userId, bool $twoFactorAuth): bool
    {
        $userConfigId = self::getUserConfigId($userId);
        if (empty($userConfigId)) {
            return false;
        }

        $columns = ['two_factor_auth' => $twoFactorAuth];
        $condition = 'id = :id';
        $params = [':id' => $userConfigId];

        try {
            $query = new Query();
            return $query->createCommand()
                ->update(UserConfig::tableName(), $columns, $condition, $params)
                ->execute();
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Get user config ID by user ID
     * @param int $userId
     * @return int|false
     */
    public static function getUserConfigId(int $userId)
    {
        $query = new Query();
        $userConfig = $query
            ->select('user_config_id')
            ->from(User::tableName())
            ->where(['id' => $userId])
            ->one();
        if (empty($userConfig)) {
            return false;
        }

        return (int)$userConfig['user_config_id'];
    }
}