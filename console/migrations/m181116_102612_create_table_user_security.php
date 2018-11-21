<?php

use frontend\models\Entity\UserEntity;
use frontend\models\Repository\UserRepository;
use yii\db\Migration;

/**
 * Class m181116_102612_create_table_user_security
 */
class m181116_102612_create_table_user_security extends Migration
{
    /**
     * @return bool
     * @throws Exception
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
            'table' => 'UserEntity security table (two factor authorization)',
            'user_id' => 'UserEntity ID unique identifier',
            'key' => 'UserEntity security unique key',
            'name' => 'UserEntity security name',
            'value' => 'UserEntity security value',
        ];

        $this->createTable('{{%user_security}}', [
            'id' => $this->primaryKey(11)->notNull()->unsigned(),
            'user_id' => $this->integer(11)->unsigned()->unique()->notNull()->comment($comments['user_id']),
            'key' => $this->string(32)->notNull()->comment($comments['key']),
            'name' => $this->string(255)->notNull()->comment($comments['name']),
            'value' => $this->tinyInteger(1)->notNull()->defaultValue(0)->comment($comments['value']),
        ], $tableOptions);

        $this->addCommentOnTable('{{%user_security}}', $comments['table']);

        // Create indexes
        $this->createIndex('user_security_idx1', '{{%user_security}}', 'user_id');

        // Create foreign keys
        $this->addForeignKey('user_security_fk1', '{{%user_security}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

        // Insert in table
        $userIds = UserRepository::getAll('{{%user}}', ['id']);
        foreach ($userIds as $userId) {
            $user = UserEntity::findIdentity($userId);
            if ($user) {
                $user->generateAuthKey(32);
                $data = [
                    'user_id' => $user->getId(),
                    'key' => $user->getAuthKey(),
                    'name' => 'two-factor-auth',
                    'value' => random_int(0,1)
                ];
                $this->insert('{{%user_security}}', $data);
            }
        }

        return true;
    }

    /**
     * @return bool
     */
    public function safeDown(): bool
    {
        $this->dropForeignKey('user_security_fk1', '{{%user_security}}');
        $this->dropTable('{{%user_security}}');
        return true;
    }
}
