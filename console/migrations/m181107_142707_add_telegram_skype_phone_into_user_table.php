<?php

use yii\db\Migration;

/**
 * Class m181107_142707_add_telegram_skype_phone_into_user_table
 */
class m181107_142707_add_telegram_skype_phone_into_user_table extends Migration
{

    public function safeUp()
    {
        $comments = [
            'phone' => 'User phone',
            'skype' => 'User skype',
            'telegram' => 'User telegram',
        ];

        $columnType = $this->integer(22)->unsigned()->unique()->comment($comments['phone']);
        $this->addColumn('{{%user}}', 'phone', $columnType);

        $columnType = $this->string(255)->unique()->comment($comments['skype']);
        $this->addColumn('{{%user}}', 'skype', $columnType);

        $columnType = $this->string(32)->unique()->comment($comments['telegram']);
        $this->addColumn('{{%user}}', 'telegram', $columnType);

        return true;
    }

    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'phone');
        $this->dropColumn('{{%user}}', 'skype');
        $this->dropColumn('{{%user}}', 'telegram');

        return true;
    }
}
