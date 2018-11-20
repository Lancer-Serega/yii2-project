<?php

use frontend\components\View;
use frontend\models\Entity\UserEntity;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\swiftmailer\Mailer;
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

    'formatter' => [
        'dateFormat' => 'YYYY-MM-DD',
        'timeFormat' => 'HH:ii:ss',
        'datetimeFormat' => 'YYYY-MM-DD HH:ii:ss',
        'decimalSeparator' => ',',
        'thousandSeparator' => ' ',
        'currencyCode' => 'USD',
        'numberFormatterOptions' => [
            NumberFormatter::MIN_FRACTION_DIGITS => 0,
            NumberFormatter::MAX_FRACTION_DIGITS => 2,
        ]
    ],

    'log' => $log,

    'mailer' => [
        'class' => Mailer::class,
        'useFileTransport' => true,
        'transport' => [
            'class' => Swift_SmtpTransport::class,
            'host' => '127.0.0.1',
            'username' => '',
            'password' => '',
            'port' => '587',
            'encryption' => 'tls',
        ],
    ],

    'request' => [
        'csrfParam' => '_csrf',
        'enableCsrfValidation' => true,
        'cookieValidationKey' => 'vBo8qtDGBBJqHjQrrCRbiqYGkuHKEXU2',
    ],

    'session' => [
        'name' => 'session',
    ],

    'user' => [
        'identityClass' => UserEntity::class,
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

    'urlManager' => $urlManager,

    'view' => [
        'class' => View::class,
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