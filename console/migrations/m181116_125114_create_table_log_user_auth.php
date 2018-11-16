<?php

use yii\db\Migration;

/**
 * Class m181116_125114_create_table_log
 */
class m181116_125114_create_table_log_user_auth extends Migration
{
    /**
     * @return bool
     */
    public function safeUp()
    {
        // Create table
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $comments = [
            'table' => 'Table of logs user auth',
            'user_id' => 'User ID unique identifier',
            'ip' => 'IP user',
            'user_agent' => 'User agent info of user',
            'msg' => 'Message log',
            'timestamp' => 'Timestamp record'
        ];

        $this->createTable('{{%log_user_auth}}', [
            'id' => $this->primaryKey(11)->notNull()->unsigned(),
            'user_id' => $this->integer(11)->unsigned()->notNull()->comment($comments['user_id']),
            'ip' => $this->string(32)->notNull()->comment($comments['ip']),
            'user_agent' => $this->text()->notNull()->comment($comments['user_agent']),
            'msg' => $this->text()->notNull()->comment($comments['msg']),
            'timestamp' => "TIMESTAMP NOT NULL DEFAULT NOW() COMMENT '{$comments['timestamp']}'",
        ], $tableOptions);

        $this->addCommentOnTable('{{%log_user_auth}}', $comments['table']);

        // Create indexes
        $this->createIndex('log_user_auth_idx1', '{{%log_user_auth}}', 'user_id');

        // Create foreign keys
        $this->addForeignKey('log_user_auth_fk1', '{{%log_user_auth}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

        return true;
    }

    public function safeDown()
    {
        $this->dropForeignKey('log_user_auth_fk1', '{{%log_user_auth}}');
        $this->dropTable('{{%log_user_auth}}');
        return true;
    }
}
