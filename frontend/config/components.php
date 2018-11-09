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
        'class' => LangRequest::class
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
        'class'=> LangUrlManager::class,
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'suffix' => '',
        // 'normalizer' => [
        //     'class' => UrlNormalizer::class,
        //     'collapseSlashes' => true,
        //     'action' => UrlNormalizer::ACTION_REDIRECT_TEMPORARY, // Use a temporary redirect instead of permanent
        // ],
        'rules' => require __DIR__ . '/route.php',
    ],

    'view' => [
        'theme' => [
            'basePath' => '@frontend/themes/admin-pro',
            'baseUrl' => '@web/themes/admin-pro',
            'pathMap' => [
                '@app/views' => [
                    '@frontend/views/themes/admin-pro',
                    '@frontend/views/themes/basic',
                ],
            ],
        ],
    ],
];