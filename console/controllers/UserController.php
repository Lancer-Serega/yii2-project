<?php

namespace console\controllers;

use frontend\models\Entity\UserConfigEntity;
use frontend\models\Entity\UserEntity;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

/**
 * User manipulations.
 */
class UserController extends Controller
{
    /**
     * @var string Option for get help about command.
     */
    public $help;

    /**
     * @var string Option user name. (Default 'admin')
     */
    public $name;

    /**
     * @var string Option user email. (Default 'admin@admin.com')
     */
    public $email;

    /**
     * @var string Option user password. (Default 'Admin12345Password')
     */
    public $password;

    /**
     * @param string $actionID
     * @return array|string[]
     */
    public function options($actionID): array
    {
        return [
            'help',
            'name',
            'email',
            'password',
        ];
    }

    /**
     * @return array
     */
    public function optionsHelp(): array
    {
        return [
            '--help' => '[-h] Help with options.',
            '--name' => '[-n] Name of user.',
            '--email' => '[-e] Email of user.',
            '--password' => '[-p] Password of user.',
        ];
    }

    /**
     * @return array
     */
    public function optionAliases(): array
    {
        return [
            'h' => 'help',
            'n' => 'name',
            'e' => 'email',
            'p' => 'password',
        ];
    }

    /**
     * Add user with admin role.
     *
     * @return int
     * @throws \yii\base\Exception
     */
    public function actionAddAdmin(): int
    {
        $message = '';
        $tab = '    ';
        $status = $this->ansiFormat('[ERROR]', Console::FG_RED);
        $status = $this->ansiFormat($status, Console::BOLD);

        if (UserEntity::find()->where(['username' => $this->name ?? 'admin'])->one()) {
            $message .= "$status An administrator has already been created!";
            echo $message;
            return ExitCode::UNSPECIFIED_ERROR;
        }

        if (UserEntity::find()->where(['email' => $this->email ?? 'admin@admin.com'])->one()) {
            $message .= "$status An administrator has already been created!";
            echo $message;
            return ExitCode::UNSPECIFIED_ERROR;
        }

        $output = 'Generate Admin user' . PHP_EOL;
        $output .= $this->name ? 'Name: ' . $this->name . PHP_EOL : '';
        $output .= $this->email ? 'Email: ' . $this->email . PHP_EOL : '';
        $output .= $this->password ? 'Password: ' . $this->password . PHP_EOL : '';
        $output .= '...' . PHP_EOL;
        echo $output;

        $userConfig = new UserConfigEntity();
        $userConfig->language_id = 1;
        $userConfig->save();

        $user = new UserEntity();
        $user->username = $this->name ?? 'admin';
        $user->email = $this->email ?? 'admin@admin.com';
        $user->email_status = UserEntity::EMAIL_CONFIRMED;
        $user->user_config_id = $userConfig->getId();
        $user->setPassword($this->password ?? 'Admin12345Password');
        $user->generateAuthKey(32);

        if ($user->save()) {
            $status = $this->ansiFormat('[OK]', Console::FG_GREEN);
            $status = $this->ansiFormat($status, Console::BOLD);
            $message .= "$status Administrator has been successfully created!" . PHP_EOL;
            echo $message;
            return ExitCode::OK;
        }

        if (!empty($user->errors)) {
            $message = "$status An error occurred while creating admin!" . PHP_EOL;

            foreach ($user->errors as $errorName => $errorMsgList) {
                foreach ($errorMsgList as $errorMsg) {
                    $status = $this->ansiFormat("[$errorName]", Console::FG_YELLOW);
                    $status = $this->ansiFormat($status, Console::BOLD);
                    $message .= "{$tab}$status $errorMsg" . PHP_EOL;
                }
            }
        }

        echo $message;
        return ExitCode::UNSPECIFIED_ERROR;
    }
}
