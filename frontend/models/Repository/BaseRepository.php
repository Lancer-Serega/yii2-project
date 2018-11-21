<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 19.11.18
 * Time: 12:54
 */

namespace frontend\models\Repository;

use yii\base\Model;
use yii\db\Query;

/**
 * Class BaseRepository
 * @package frontend\models\Repository
 */
class BaseRepository extends Model
{
    /**
     * Get all records by condition.
     *
     * @param string $table
     * @param array $select
     * @param array $where
     * @return array
     */
    public static function getAll(string $table, array $select, array $where = []): array
    {
        $query = new Query();
        $result = $query
            ->select($select)
            ->from($table)
            ->where($where)
            ->all();

        return $result;
    }
}