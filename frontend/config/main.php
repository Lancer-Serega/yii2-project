<?php

use frontend\models\Entity\UserEntity;
use frontend\models\Entity\UserConfigEntity;

$db = require __DIR__ . '/db.php';
$log = require __DIR__ . '/log.php';
$urlManager = require __DIR__ . '/url_manager.php';
$view = require __DIR__ . '/view.php';

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
            UserEntity::class => [
                'config' => UserConfigEntity::class
            ]
        ]
    ],
    'params' => $params,
];
