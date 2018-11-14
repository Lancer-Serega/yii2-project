<?php

use frontend\models\User;
use frontend\components\LangUrlManager;
use frontend\components\LangRequest;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\swiftmailer\Mailer;
use yii\log\FileTarget;
use yii\caching\FileCache;
use yii\web\AssetManager;
use yii\rbac\DbManager;
use yii\web\UrlManager;

return [
    'assetManager' => [
        'class' => AssetManager::class,
        'forceCopy' => true,
    ],

    'authManager' => [
        'class'           => DbManager::class,
        'itemTable'       => 'auth_item',
        'itemChildTable'  => 'auth_item_child',
        'assignmentTable' => 'auth_assignment',
        'ruleTable'       => 'auth_rule',
        'defaultRoles'    => ['guest'],
    ],

    'cache' => [
        'class' => FileCache::class,
        'cachePath' => $params['runtime_cache_dir_frontend'],
    ],

    'db' => $db,

    'errorHandler' => [
        'errorAction' => 'index/error',
    ],

    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            [
                'class' => FileTarget::class,
                'levels' => ['error', 'warning'],
            ],
        ],
    ],

    'mailer' => [
        'class' => Mailer::class,
        // send all mails to a file by default. You have to set
        // 'useFileTransport' to false and configure a transport
        // for the mailer to send real emails.
        'useFileTransport' => true,
        'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => '127.0.0.1',
            'username' => '',
            'password' => '',
            'port' => '25',
            'encryption' => 'tls',
        ],
    ],

    'request' => [
        'csrfParam' => '_csrf',
        'enableCsrfValidation' => true,
        'cookieValidationKey' => 'vBo8qtDGBBJqHjQrrCRbiqYGkuHKEXU2',
//        'class' => LangRequest::class
    ],

    'session' => [
        // this is the name of the session cookie used for login on the frontend
        'name' => 'session',
    ],

    'user' => [
        'identityClass' => User::class,
        'enableAutoLogin' => true,
        'identityCookie' => ['name' => '_identity-cookie', 'httpOnly' => true],
    ],

    'language' => 'en-US',
    'sourceLanguage' => 'en-US',
    'i18n' => require __DIR__ . '/i18n.php',

    'timestamp' => [
        'class' => TimestampBehavior::class,
        'attributes' => [
            ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
            ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
        ],
        'value' => new Expression('CURRENT_TIMESTAMP'),
    ],

    'formatter' => [
        'dateFormat' => 'YYYY-MM-DD',
        'timeFormat' => 'HH:ii:ss',
        'datetimeFormat' => 'YYYY-MM-DD HH:ii:ss',
    ],

    'urlManager' => [
        'class'=> UrlManager::class,
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'suffix' => '',
        'rules' => [
            '<controller:(language)>/<action:(switch)>/<lang:(en|ru)>' => '<controller>/<action>',
            'settings' => 'cabinet/settings',
            '<action:(login|logout|signin|request-password-reset|reset-password|signin-confirm|resend-email)>' => 'identity/<action>',
            '<controller:(cabinet|blog|tariff)>' => '<controller>/index',
            '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            'robots.txt' => 'seo/manage/get-robots',
        ],
    ],

    'view' => [
        'theme' => [
            'basePath' => '@app/themes/admin-pro',
            'baseUrl' => '@web/themes/admin-pro',
            'pathMap' => [
                '@app/views' => [
                    '@app/views/themes/admin-pro',
                    '@app/views/themes/basic',
                ],
            ],
        ],
    ],
];