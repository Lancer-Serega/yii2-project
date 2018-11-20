<?php

namespace frontend\models\Entity;

/**
 * This is the model class for table "log_user_auth".
 *
 * @property int $id
 * @property int $user_id [int(11) unsigned]  UserEntity ID unique identifier
 * @property string $ip [varchar(32)]  IP user
 * @property string $msg [varchar(255)]  Message log
 * @property int $timestamp [timestamp]  Timestamp record
 * @property string $user_agent UserEntity agent info of user
 */
class LogUserAuthEntity extends BaseEntity
{
    public const LOG_CATEGORY_USER_AUTH_SUCCESS = 'user.auth.success';
    public const LOG_CATEGORY_USER_AUTH_ERROR = 'user.auth.error';

    /**
     * @var UserEntity Object of identity user
     */
    public $user;

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%log_user_auth}}';
    }
}