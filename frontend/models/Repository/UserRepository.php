<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 16.11.18
 * Time: 13:11
 */

namespace frontend\models\Repository;

use yii\db\Query;

/**
 * Class UserRepository
 * @package frontend\models\Repository
 */
class UserRepository extends BaseRepository
{
    /**
     * Get all users data.
     *
     * @param array $select
     * @return array
     */
    public static function getAll(array $select): array
    {
        $query = new Query();
        $result = $query->select($select)->from('{{%user}}')->all();
        if (\count($select) === 1) {
            reset($select);
            $key = key($select);
            $result = array_column($result, $select[$key]);
        }

        return $result;
    }
}