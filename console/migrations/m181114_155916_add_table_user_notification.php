<?php

use yii\db\Migration;

/**
 * Class m181114_155916_add_table_user_notification
 */
class m181114_155916_add_table_user_notification extends Migration
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
            'table' => 'User notifications table',
            'user_id' => 'User unique identifier',
            'name' => 'Notification name',
            'value' => 'Notification value',
        ];

        $this->createTable('{{%user_notification}}', [
            'id' => $this->primaryKey(11)->notNull()->unsigned(),
            'user_id' => $this->integer(11)->unsigned()->unique()->notNull()->comment($comments['user_id']),
            'name' => $this->string(255)->notNull()->comment($comments['name']),
            'value' => $this->tinyInteger(1)->notNull()->defaultValue(0)->comment($comments['value']),
        ], $tableOptions);

        $this->addCommentOnTable('{{%user_notification}}', $comments['table']);

        // Create indexes
        $this->createIndex('user_notification_idx1', '{{%user_notification}}', 'user_id');

        // Create foreign keys
        $this->addForeignKey('user_notification_fk1', '{{%user_notification}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

        return true;
    }

    public function safeDown()
    {
        $this->dropTable('{{%user_notification}}');
        return true;
    }
}
