<?php

use frontend\models\User;
use yii\db\Migration;

/**
 * Class m181029_175019_user
 */
class m181029_175019_user extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $comments = [
            'table' => 'User table',
            'role' => 'User role ID of table auth_rule',
            'login' => 'User login',
            'username' => 'User name',
            'auth_key' => '',
            'password_hash' => 'Hash user password',
            'password_reset_token' => 'Password reset token',
            'email' => 'User Email',
            'status' => 'User status (active or deleted)',
            'created_at' => 'User register date',
            'updated_at' => 'User update date',
        ];

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(11)->notNull()->unsigned(),
            'role' => $this->tinyInteger(2)->notNull()->unsigned()->comment($comments['role']),
            'login' => $this->string(255)->notNull()->unique()->comment($comments['login']),
            'username' => $this->string(255)->notNull()->comment($comments['username']),
            'auth_key' => $this->string(32)->notNull()->comment($comments['auth_key']),
            'password_hash' => $this->string()->notNull()->comment($comments['password_hash']),
            'password_reset_token' => $this->string()->unique()->comment($comments['password_reset_token']),
            'email' => $this->string(255)->notNull()->unique()->comment($comments['email']),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1)->comment($comments['status']),
            'created_at' => "TIMESTAMP NOT NULL DEFAULT NOW() COMMENT '{$comments['created_at']}'",
            'updated_at' => "TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW() COMMENT '{$comments['updated_at']}'",
        ], $tableOptions);

        $this->addCommentOnTable('lang', $comments['table']);

        $this->createIndex('user_idx1', 'user', 'role');
        $this->createIndex('user_idx2', 'user', 'login');
        $this->createIndex('user_idx3', 'user', 'username');
        $this->createIndex('user_idx4', 'user', 'auth_key');
        $this->createIndex('user_idx5', 'user', 'password_hash');
        $this->createIndex('user_idx6', 'user', 'password_reset_token');
        $this->createIndex('user_idx7', 'user', 'email');
        $this->createIndex('user_idx8', 'user', 'status');
        $this->createIndex('user_idx9', 'user', 'created_at');
        $this->createIndex('user_idx10', 'user', 'updated_at');

        $user = new User();
        $user->generateAuthKey();
        $user->setPassword('admin');

        $this->insert('user', [
            'role' => '1',
            'login' => 'admin',
            'username' => 'admin_name',
            'auth_key' => $user->getAuthKey(),
            'password_hash' => $user->password_hash,
            'email' => 'admin@admin.ru',
        ]);

        return true;
    }

    public function safeDown()
    {
        $this->delete('user');

        $this->dropIndex('user_idx1', 'user');
        $this->dropIndex('user_idx2', 'user');
        $this->dropIndex('user_idx3', 'user');
        $this->dropIndex('user_idx4', 'user');
        $this->dropIndex('user_idx5', 'user');
        $this->dropIndex('user_idx6', 'user');

        $this->dropTable('{{%user}}');

        return true;
    }
}
