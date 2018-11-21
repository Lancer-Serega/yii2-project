<?php

use yii\db\Migration;

/**
 * Class m181121_093238_create_table_notification
 */
class m181121_093238_create_table_notification extends Migration
{
    /**
     * @return bool
     */
    public function safeUp(): bool
    {
        // Create table
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $comments = [
            'table' => 'Notifications list table',
            'type' => 'Notification type',
            'name' => 'Notification name',
        ];

        $this->createTable('{{%notification}}', [
            'id' => $this->primaryKey(11)->notNull()->unsigned(),
            'type' => $this->string(255)->notNull()->comment($comments['type']),
            'name' => $this->string(255)->notNull()->comment($comments['name']),
        ], $tableOptions);

        $this->addCommentOnTable('{{%notification}}', $comments['table']);

        // Create indexes
        $this->createIndex('notification_idx1', '{{%notification}}', 'type');
        $this->createIndex('notification_idx2', '{{%notification}}', ['type', 'name']);
        $this->createIndex('notification_idx3', '{{%notification}}', ['type', 'name'], true);

        return true;
    }

    /**
     * @return bool
     */
    public function safeDown(): bool
    {
        $this->dropTable('{{%notification}}');
        return true;
    }
}
