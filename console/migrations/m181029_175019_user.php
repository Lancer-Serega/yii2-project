<?php

use frontend\models\User;
use yii\db\Migration;

/**
 * Class m181029_175019_user
 */
class m181029_175019_user extends Migration
{
    public static $errors = [];

    public static function hasErrors()
    {
        return (bool)count(self::$errors);
    }

    /**
     * @return bool
     * @throws \yii\base\Exception
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
            'table' => 'User table',
            'username' => 'User name',
            'auth_key' => '',
            'password_hash' => 'Hash user password',
            'password_reset_token' => 'Password reset token',
            'email' => 'User Email',
            'email_confirm_token' => 'User Email confirm token. Need to confirm user email',
            'email_status' => 'User Email status (0 => EMAIL_NOT_CONFIRMED, 1 => EMAIL_CONFIRMED). See the full list in the User model.',
            'status' => 'User status (active or deleted)',
            'created_at' => 'User register date',
            'updated_at' => 'User update date',
            'phone' => 'User phone',
            'skype' => 'User skype',
            'telegram' => 'User telegram',
            'language' => 'User language interface'
        ];

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(11)->notNull()->unsigned(),
            'username' => $this->string(255)->notNull()->comment($comments['username']),
            'auth_key' => $this->string(32)->notNull()->comment($comments['auth_key']),
            'password_hash' => $this->string()->notNull()->comment($comments['password_hash']),
            'password_reset_token' => $this->string()->unique()->comment($comments['password_reset_token']),
            'email' => $this->string(255)->notNull()->unique()->comment($comments['email']),
            'email_confirm_token' => $this->string(32)->unique()->comment($comments['email_confirm_token']),
            'email_status' => $this->tinyInteger(1)->notNull()->defaultValue(0)->comment($comments['email_status']),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1)->comment($comments['status']),
            'created_at' => "TIMESTAMP NOT NULL DEFAULT NOW() COMMENT '{$comments['created_at']}'",
            'updated_at' => "TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW() COMMENT '{$comments['updated_at']}'",
            'phone' =>  $this->string(22)->unique()->comment($comments['phone']),
            'skype' =>  $this->string(255)->unique()->comment($comments['skype']),
            'telegram' => $this->string(32)->unique()->comment($comments['telegram']),
            'language' => $this->integer(11)->unsigned()->comment($comments['language']),
        ], $tableOptions);

        $this->addCommentOnTable('{{%user}}', $comments['table']);

        // Create indexes
        $this->createIndex('user_idx1', 'user', 'username');
        $this->createIndex('user_idx2', 'user', 'auth_key');
        $this->createIndex('user_idx3', 'user', 'password_hash');
        $this->createIndex('user_idx4', 'user', 'password_reset_token');
        $this->createIndex('user_idx5', 'user', 'email');
        $this->createIndex('user_idx6', 'user', 'email_confirm_token');
        $this->createIndex('user_idx7', 'user', 'email_status');
        $this->createIndex('user_idx8', 'user', 'status');
        $this->createIndex('user_idx9', 'user', 'created_at');
        $this->createIndex('user_idx10', 'user', 'updated_at');

        // Create foreign keys
        $this->addForeignKey('user_fk1', '{{%user}}', 'language', '{{%lang}}', 'id', 'CASCADE', 'CASCADE');

        // Insert users
        $user = new User();
        $user->generateAuthKey();
        $user->setPassword('This is Supper - puper password!');

        $this->insert('{{%user}}', [
            'username' => 'root_name',
            'auth_key' => $user->getAuthKey(),
            'password_hash' => $user->password_hash,
            'email' => 'root@email.com',
            'email_confirm_token' => null,
            'email_status' => User::EMAIL_CONFIRMED,
            'status' => User::STATUS_ACTIVE,
            'language' => 1,
        ]);

        $this->insert('{{%user}}', [
            'username' => 'admin_name',
            'auth_key' => $user->getAuthKey(),
            'password_hash' => $user->password_hash,
            'email' => 'admin@email.com',
            'email_confirm_token' => null,
            'email_status' => User::EMAIL_CONFIRMED,
            'status' => User::STATUS_ACTIVE,
            'language' => 1,
        ]);

        $this->insert('{{%user}}', [
            'username' => 'user_name',
            'auth_key' => $user->getAuthKey(),
            'password_hash' => $user->password_hash,
            'email' => 'user@email.com',
            'email_confirm_token' => null,
            'email_status' => User::EMAIL_CONFIRMED,
            'status' => User::STATUS_ACTIVE,
            'language' => 1,
        ]);

        $this->insert('{{%user}}', [
            'username' => 'user_name_delete_status',
            'auth_key' => $user->getAuthKey(),
            'password_hash' => $user->password_hash,
            'email' => 'user_delete_status@email.com',
            'email_confirm_token' => null,
            'email_status' => User::EMAIL_CONFIRMED,
            'status' => User::STATUS_DELETED,
            'language' => 1,
        ]);

        $this->insert('{{%user}}', [
            'username' => 'user_name_email_not_confirmed',
            'auth_key' => $user->getAuthKey(),
            'password_hash' => $user->password_hash,
            'email' => 'user_email_not_confirmed@email.com',
            'email_confirm_token' => Yii::$app->security->generateRandomString(32),
            'email_status' => User::EMAIL_NOT_CONFIRMED,
            'status' => User::STATUS_ACTIVE,
            'language' => 1,
        ]);

        return true;
    }

    public function safeDown()
    {
        $this->dropRbacTables();
        $this->dropUserTable();

        return true;
    }

    private function dropUserTable()
    {
        $this->delete('{{%user}}');
        $this->dropTable('{{%user}}');
    }

    private function dropRbacTables()
    {
        $this->delete('{{%auth_assignment}}');
        $this->delete('{{%auth_item}}');
        $this->delete('{{%auth_item_child}}');
        $this->delete('{{%auth_rule}}');
        $this->dropTable('{{%auth_assignment}}');
        $this->dropTable('{{%auth_item}}');
        $this->dropTable('{{%auth_item_child}}');
        $this->dropTable('{{%auth_rule}}');
    }
}