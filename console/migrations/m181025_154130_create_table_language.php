<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m181025_154130_create_table_language
 */
class m181025_154130_create_table_language extends Migration
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
            'table' => 'Language storage table. Taking into account that the number of languages ​​is unlimited and the default language should be indicated, it was decided to store this list in a separate database table.',
            'url' => 'Alphabetic identifier of the language to display in the URL (ru, en, de, ...)',
            'local' => 'User language (locale)',
            'name' => 'Name (English, Русский, ...)',
            'default' => 'Lag indicating the default language (1 - default language)',
            'date_update' => 'Update date (in unix timestamp)',
            'date_create' => 'Creation date (in unix timestamp)',
        ];

        $this->createTable('{{%language}}', [
            'id' => $this->primaryKey(11)->notNull()->unsigned(),
            'url' => $this->string(255)->notNull()->unique()->comment($comments['url']),
            'local' => $this->string(255)->notNull()->unique()->comment($comments['local']),
            'name' => $this->string(255)->notNull()->unique()->comment($comments['name']),
            'default' => $this->smallInteger(6)->notNull()->defaultValue(0)->comment($comments['default']),
            'date_update' => $this->timestamp()->notNull()->defaultValue(new Expression('NOW()'))->comment($comments['date_update']),
            'date_create' => $this->timestamp()->notNull()->defaultValue(new Expression('NOW()'))->comment($comments['date_create']),
        ], $tableOptions);

        $this->addCommentOnTable('{{%language}}', $comments['table']);

        $this->createIndex('lang_idx1', '{{%language}}', 'url');
        $this->createIndex('lang_idx2', '{{%language}}', 'local');
        $this->createIndex('lang_idx3', '{{%language}}', 'name');
        $this->createIndex('lang_idx4', '{{%language}}', 'default');
        $this->createIndex('lang_idx5', '{{%language}}', 'date_update');
        $this->createIndex('lang_idx6', '{{%language}}', 'date_create');

        $this->insert('{{%language}}',[
            'url' => 'en',
            'local' => 'en-US',
            'name' => 'English',
            'default' => 1,
        ]);
        $this->insert('{{%language}}',[
            'url' => 'ru',
            'local' => 'ru-RU',
            'name' => 'Русский',
            'default' => 0,
        ]);

        return true;
    }

    /**
     * @return bool
     */
    public function safeDown(): bool
    {
        $this->delete('{{%language}}');

        $this->dropIndex('lang_idx1', '{{%language}}');
        $this->dropIndex('lang_idx2', '{{%language}}');
        $this->dropIndex('lang_idx3', '{{%language}}');
        $this->dropIndex('lang_idx4', '{{%language}}');
        $this->dropIndex('lang_idx5', '{{%language}}');
        $this->dropIndex('lang_idx6', '{{%language}}');

        $this->dropTable('{{%language}}');

        return true;
    }
}
