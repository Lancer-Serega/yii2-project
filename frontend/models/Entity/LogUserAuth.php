<?php
namespace frontend\models\Entity;

/**
 * This is the model class for table "log_user_auth".
 *
 * @property int $id
 * @property int $user_id [int(11) unsigned]  User ID unique identifier
 * @property string $ip [varchar(32)]  IP user
 * @property string $msg [varchar(255)]  Message log
 * @property int $timestamp [timestamp]  Timestamp record
 * @property string $user_agent User agent info of user
 */
class LogUserAuth extends BaseEntity
{
    public const LOG_CATEGORY_USER_AUTH_SUCCESS = 'user.auth.success';
    public const LOG_CATEGORY_USER_AUTH_ERROR = 'user.auth.error';

    /**
     * @var User Object of identity user
     */
    public $user;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%log_user_auth}}';
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User id',
            'ip' => 'IP user',
            'msg' => 'Message',
            'timestamp' => 'Created At',
        ];
    }
}