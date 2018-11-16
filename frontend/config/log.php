<?php

use frontend\components\Logger\Target\UserAuthTarget;
use yii\log\DbTarget;

return [
    'traceLevel' => YII_DEBUG ? 3 : 0,
    'flushInterval' => YII_DEBUG ? 1 : 500,

    'targets' => [
        [ // Send in database all error and warning logs in table `log`
            'class' => DbTarget::class,
            'levels' => ['error', 'warning'],
            'db' => 'db',
            'logTable' => '{{%log}}',
            'logVars' => [],
        ],

        [ // Send in database user auth status-log
            'class' => UserAuthTarget::class,
            'db' => 'db',
            'logTable' => '{{%log_user_auth}}',
            'logVars' => [],
            'categories' => ['user.auth'],
        ],

        // 'auth' => [
        //     'class' => FileTarget::class, // Send in log-file
        //     'exportInterval' => YII_DEBUG ? 10 : 10000, // Max message count in log file
        //     'levels' => ['error', 'warning', 'info'],
        //     'maxFileSize' => YII_DEBUG ? 1024 : 1024 * 100,
        //     'maxLogFiles' => YII_DEBUG ? 5 : 100,
        //     'logFile' => '@runtime/logs/user/auth.log', // Log-file path
        //     'logVars' => [], // What global variables to add to the log ($_SERVER, $_SESSION...)
        // ],

        // 'mail' => [
        //     'class' => EmailTarget::class, // Send to e-mail
        //     'categories' => ['payment_success'],
        //     'mailer' => Mailer::class,
        //     'logVars' => [],
        //     'message' => [
        //         'from' => ['admin@site.com' => 'НАЗВАНИЕ САЙТА'],
        //         'to' => ['mail@gmail.com'],
        //         'subject' => '<h1>Message body</h1>.',
        //     ],
        // ],
    ],
];