<?php
namespace console\controllers;

use frontend\models\Entity\UserEntity;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

/**
 * UserEntity controller
 */
class UserController extends Controller
{
    public function actionAddAdmin() {
        $message = '';
        $tab = '    ';
        $status = $this->ansiFormat('[ERROR]', Console::FG_RED);
        $status = $this->ansiFormat($status, Console::BOLD);

        if (UserEntity::find()->where(['username' => 'admin'])->one()) {
            $message .= "$status An administrator has already been created!";
            echo $message;
            return ExitCode::UNSPECIFIED_ERROR;
        }

        echo 'Generate Admin user...' . PHP_EOL;

        $user = new UserEntity();
        $user->id = '';
        $user->username = 'admin';
        $user->email = 'admin@admin.com';
        $user->setPassword('52662699');
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
