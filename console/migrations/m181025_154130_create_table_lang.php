<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m181025_154130_create_table_lang
 */
class m181025_154130_create_table_lang extends Migration
{
    /**
     * {@inheritdoc}
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
            'table' => 'Language storage table. Taking into account that the number of languages ​​is unlimited and the default language should be indicated, it was decided to store this list in a separate database table.',
            'url' => 'Alphabetic identifier of the language to display in the URL (ru, en, de, ...)',
            'local' => 'User language (locale)',
            'name' => 'Name (English, Русский, ...)',
            'default' => 'Lag indicating the default language (1 - default language)',
            'date_update' => 'Update date (in unix timestamp)',
            'date_create' => 'Creation date (in unix timestamp)',
        ];

        $this->createTable('{{%lang}}', [
            'id' => $this->primaryKey(11)->notNull()->unsigned(),
            'url' => $this->string(255)->notNull()->unique()->comment($comments['url']),
            'local' => $this->string(255)->notNull()->unique()->comment($comments['local']),
            'name' => $this->string(255)->notNull()->unique()->comment($comments['name']),
            'default' => $this->smallInteger(6)->notNull()->defaultValue(0)->comment($comments['default']),
            'date_update' => $this->timestamp()->notNull()->defaultValue(new Expression('NOW()'))->comment($comments['date_update']),
            'date_create' => $this->timestamp()->notNull()->defaultValue(new Expression('NOW()'))->comment($comments['date_create']),
        ], $tableOptions);

        $this->addCommentOnTable('{{%lang}}', $comments['table']);

        $this->createIndex('lang_idx1', 'lang', 'url');
        $this->createIndex('lang_idx2', 'lang', 'local');
        $this->createIndex('lang_idx3', 'lang', 'name');
        $this->createIndex('lang_idx4', 'lang', 'default');
        $this->createIndex('lang_idx5', 'lang', 'date_update');
        $this->createIndex('lang_idx6', 'lang', 'date_create');

        $this->insert('lang',[
            'url' => 'en',
            'local' => 'en-US',
            'name' => 'English',
            'default' => 1,
        ]);
        $this->insert('lang',[
            'url' => 'ru',
            'local' => 'ru-RU',
            'name' => 'Русский',
            'default' => 0,
        ]);

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%lang}}');

        $this->dropIndex('lang_idx1', 'lang');
        $this->dropIndex('lang_idx2', 'lang');
        $this->dropIndex('lang_idx3', 'lang');
        $this->dropIndex('lang_idx4', 'lang');
        $this->dropIndex('lang_idx5', 'lang');
        $this->dropIndex('lang_idx6', 'lang');

        $this->dropTable('{{%lang}}');

        return true;
    }
}
