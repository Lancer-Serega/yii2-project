<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 16.11.18
 * Time: 13:11
 */

namespace frontend\models\Repository;


use yii\db\Query;

class UserRepository extends BaseRepository
{

    public static function getAll(array $select)
    {
        $query = new Query();
        $result = $query->select($select)->from('{{%user}}')->all();
        if (count($select) === 1) {
            reset($select);
            $key = key($select);
            $result = array_column($result, $select[$key]);
        }

        return $result;
    }
}