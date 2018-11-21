<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 19.11.18
 * Time: 12:48
 */

namespace frontend\models\Repository;

use frontend\models\Entity\UserEntity;
use frontend\models\Entity\UserConfigEntity;
use yii\db\Exception;
use yii\db\Query;

/**
 * Class UserConfigRepository
 * @package frontend\models\Repository
 */
class UserConfigRepository extends BaseRepository
{
    /**
     * Check whether user two-factor authentication is enabled.
     *
     * @param array $select
     * @param int $userId
     * @return bool
     */
    public static function getTwoFactorAuth(array $select, int $userId): bool
    {
        $query = new Query();
        $userConfig = $query
            ->select('user_config_id')
            ->from(UserEntity::tableName())
            ->where(['id' => $userId])
            ->one();
        if (empty($userConfig)) {
            return false;
        }

        $result = $query
            ->select($select)
            ->from(UserConfigEntity::tableName())
            ->where(['id' => $userConfig['user_config_id']])
            ->one();
        if (empty($result)) {
            return false;
        }

        return (bool)$result['two_factor_auth'];
    }

    /**
     * Set two-factor authorization.
     *
     * @param int $userId
     * @param bool $twoFactorAuth
     * @return bool
     */
    public static function changeTwoFactorAuth(int $userId, bool $twoFactorAuth): bool
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
                ->update(UserConfigEntity::tableName(), $columns, $condition, $params)
                ->execute();
        } catch (Exception $e) {
            return false;
        }
    }


    /**
     * Get user two-factor auth key.
     *
     * @param int $userId
     * @param string $twoFactorKey
     * @return string
     */
    public static function checkTwoFactorAuthKey(int $userId, string $twoFactorKey): ?string
    {
        $query = new Query();
        $userConfig = $query
            ->select('user_config_id')
            ->from(UserEntity::tableName())
            ->where(['id' => $userId])
            ->one();
        if (empty($userConfig)) {
            return false;
        }

        $result = $query
            ->select('two_factor_auth_key')
            ->from(UserConfigEntity::tableName())
            ->where(['id' => $userConfig['user_config_id']])
            ->one();
        if (empty($result)) {
            return false;
        }

        return $result['two_factor_auth_key'] === $twoFactorKey;
    }

    /**
     * Get user config ID by user ID.
     *
     * @param int $userId
     * @return int|false
     */
    public static function getUserConfigId(int $userId): ?int
    {
        $query = new Query();
        $userConfig = $query
            ->select('user_config_id')
            ->from(UserEntity::tableName())
            ->where(['id' => $userId])
            ->one();
        if (empty($userConfig)) {
            return false;
        }

        return (int)$userConfig['user_config_id'];
    }

    /**
     * Generate two-factor authorization key.
     *
     * @return string
     * @throws \Exception
     */
    public static function generateTwoFactorAuthKey(): string
    {
        try {
            return bin2hex(random_bytes(16));
        } catch (\Exception $e) {
            throw $e;
        }
    }
}