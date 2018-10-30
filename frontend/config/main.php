<?php

use frontend\models\User;
use frontend\components\LangUrlManager;
use frontend\components\LangRequest;
use yii\i18n\PhpMessageSource;
use yii\swiftmailer\Mailer;
use yii\log\FileTarget;
use yii\caching\FileCache;
use yii\web\AssetManager;
use yii\rbac\DbManager;

$db = require __DIR__ . '/db.php';
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'index',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
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
            'cachePath' => '/home/sergey/Projects/YII2/basic/runtime/cache',
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
        ],

        'request' => [
            'csrfParam' => '_csrf-frontend',
            'enableCsrfValidation' => false,
            'cookieValidationKey' => 'vBo8qtDGBBJqHjQrrCRbiqYGkuHKEXU2',
            'class' => LangRequest::class
        ],

        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],

        'user' => [
            'identityClass' => User::class,
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],

        'language' => 'en-US',
        'sourceLanguage' => 'en-US',
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => PhpMessageSource::class,
                    'basePath' => '@app/i18n',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],

//        'timestamp' => [
//            'class' => TimestampBehavior::class,
//            'attributes' => [
//                ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
//                ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
//            ],
//            'value' => new \yii\db\Expression('CURRENT_TIMESTAMP'),
//        ],
//
//        'formatter' => [
//            'dateFormat' => 'YYYY-MM-DD',
//            'timeFormat' => 'HH:ii:ss',
//            'datetimeFormat' => 'YYYY-MM-DD HH:ii:ss',
//        ],

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
            'rules' => [
                'login' => 'index/login',
                '<action:(login|logout|signin|restore-password)>/' => 'index/<action>',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
                'robots.txt' => 'seo/manage/get-robots',
                '/' => 'index/index',
            ],
        ],
    ],
    'params' => $params,
];
