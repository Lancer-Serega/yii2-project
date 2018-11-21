<?php

use frontend\models\Entity\NotificationEntity;
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
            'table' => 'Notifications list table.',
            'type' => 'Notification type.',
            'name' => 'Notification name.',
            'description' => 'Notification description.',
        ];

        $this->createTable('{{%notification}}', [
            'id' => $this->primaryKey(11)->notNull()->unsigned(),
            'type' => $this->string(255)->notNull()->comment($comments['type']),
            'name' => $this->string(255)->notNull()->comment($comments['name']),
            'description' => $this->text()->notNull()->comment($comments['description']),
        ], $tableOptions);

        $this->addCommentOnTable('{{%notification}}', $comments['table']);

        // Create indexes
        $this->createIndex('notification_idx1', '{{%notification}}', 'type');
        $this->createIndex('notification_idx2', '{{%notification}}', ['type', 'name']);
        $this->createIndex('notification_idx3', '{{%notification}}', ['type', 'name'], true);

        $this->insert('{{%notification}}', [
            'type' => NotificationEntity::TYPE_USER_SETTING_NOTIFICATION,
            'name' => 'tariff_extension_reminder',
            'description' => 'Tariff extension reminder',
        ]);

        $this->insert('{{%notification}}', [
            'type' => NotificationEntity::TYPE_USER_SETTING_NOTIFICATION,
            'name' => 'banking_notification',
            'description' => 'Banking Notification',
        ]);

        $this->insert('{{%notification}}', [
            'type' => NotificationEntity::TYPE_USER_SETTING_NOTIFICATION,
            'name' => 'notice_of_a_response_from_the_system_ticket',
            'description' => 'Notice of a response from the system ticket',
        ]);

        $this->insert('{{%notification}}', [
            'type' => NotificationEntity::TYPE_USER_SETTING_NOTIFICATION,
            'name' => 'notification_of_entry_from_an_unknown_ip_device',
            'description' => 'Notification of entry from an unknown IP device',
        ]);

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
