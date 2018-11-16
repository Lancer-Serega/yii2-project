<?php

use frontend\models\Entity\User;
use frontend\models\Entity\UserConfig;

$db = require __DIR__ . '/db.php';
$log = require __DIR__ . '/log.php';

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
    'components' => require __DIR__ . '/components.php',
    'container' => [
        'definitions' => [
            User::class => [
                'config' => UserConfig::class
            ]
        ]
    ],
    'params' => $params,
];
