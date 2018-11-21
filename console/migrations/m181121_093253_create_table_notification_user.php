<?php

use yii\db\Migration;

/**
 * Class m181121_093253_create_table_notification_user
 */
class m181121_093253_create_table_notification_user extends Migration
{
    /**
     * @return bool
     */
    public function safeUp(): bool
    {
        // Create table
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $comments = [
            'table' => 'UserEntity notifications table',
            'user_id' => 'UserEntity unique identifier',
            'notification_id' => 'Notification ID',
            'value' => 'Notification value',
        ];

        $this->createTable('{{%notification_user}}', [
            'id' => $this->primaryKey(11)->notNull()->unsigned(),
            'user_id' => $this->integer(11)->unsigned()->notNull()->comment($comments['user_id']),
            'notification_id' => $this->integer(11)->unsigned()->notNull()->comment($comments['notification_id']),
            'value' => $this->tinyInteger(1)->notNull()->defaultValue(1)->comment($comments['value']),
        ], $tableOptions);

        $this->addCommentOnTable('{{%notification_user}}', $comments['table']);

        // Create indexes
        $this->createIndex('notification_user_idx1', '{{%notification_user}}', 'user_id');
        $this->createIndex('notification_user_idx2', '{{%notification_user}}', ['user_id', 'notification_id']);
        $this->createIndex('notification_user_idx3', '{{%notification_user}}', ['user_id', 'notification_id'], true);

        // Create foreign keys
        $this->addForeignKey('notification_user_fk1', '{{%notification_user}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('notification_user_fk2', '{{%notification_user}}', 'notification_id', '{{%notification}}', 'id', 'CASCADE', 'CASCADE');

        return true;
    }

    /**
     * @return bool
     */
    public function safeDown(): bool
    {
        $this->dropForeignKey('notification_user_fk1', '{{%notification_user}}');
        $this->dropForeignKey('notification_user_fk2', '{{%notification_user}}');
        $this->dropTable('{{%notification_user}}');

        return true;
    }
}
