<?php

use yii\db\Migration;

/**
 * Class m181119_095932_add_column_two_factor_auth_in_table_user_config
 */
class m181119_095932_add_column_two_factor_auth_in_table_user_config extends Migration
{
    /**
     * @return bool
     */
    public function safeUp(): bool
    {
        $type = $this->tinyInteger(1)->notNull()->defaultValue(0)->comment('Check two-factor authorization');
        $this->addColumn('{{%user_config}}', 'two_factor_auth', $type);
        $this->createIndex('user_config_idx2', '{{%user_config}}', 'two_factor_auth');

        $type = $this->string(32)->comment('Key for two-factor authorization');
        $this->addColumn('{{%user_config}}', 'two_factor_auth_key', $type);
        $this->createIndex('user_config_idx3', '{{%user_config}}', 'two_factor_auth_key');

        return true;
    }

    /**
     * @return bool
     */
    public function safeDown(): bool
    {
        $this->dropIndex('user_config_idx3', '{{%user_config}}');
        $this->dropIndex('user_config_idx2', '{{%user_config}}');
        $this->dropTable('{{%user_config}}');

        return true;
    }
}
