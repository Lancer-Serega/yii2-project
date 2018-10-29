<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
$db = require __DIR__ . '/db.php';

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'index',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'forceCopy' => true,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '/home/sergey/Projects/YII2/basic/runtime/cache',
        ],
        'errorHandler' => [
            'errorAction' => 'index/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'cookieValidationKey' => 'vBo8qtDGBBJqHjQrrCRbiqYGkuHKEXU2',
            'class' => 'frontend\components\LangRequest'
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],

        'language' => 'en-US',
        'sourceLanguage' => 'en-US',
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/i18n',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'class'=>'frontend\components\LangUrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '/',
//            'normalizer' => [
//                'class' => 'yii\web\UrlNormalizer',
//                'action' => UrlNormalizer::ACTION_REDIRECT_TEMPORARY, // Use a temporary redirect instead of permanent
//            ],
            'rules' => [
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
                '<action:(login|logout|signin|restore-password)>/' => 'index/<action>',
                'robots.txt' => 'seo/manage/get-robots',
                '/' => 'index/index',
            ],
        ],
    ],
    'params' => $params,
];
