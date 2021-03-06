<?php

use yii\log\DbTarget;
use yii\console\controllers\FixtureController;
use yii\rbac\DbManager;

$db = require __DIR__ . '/db.php';
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => FixtureController::class,
            'namespace' => 'common\fixtures',
          ],
    ],
    'components' => [
        'db' => $db,

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'flushInterval' => YII_DEBUG ? 1 : 500,

            'targets' => [
                [
                    'class' => DbTarget::class, // Send in database
                    'levels' => ['error', 'warning', 'info'],
                    'db' => 'db',
                    'logTable' => '{{%log}}',
                    'logVars' => [],
                ],
            ],
        ],
        'authManager' => [
            'class'           => DbManager::class,
            'itemTable'       => 'auth_item',
            'itemChildTable'  => 'auth_item_child',
            'assignmentTable' => 'auth_assignment',
            'ruleTable'       => 'auth_rule',
            'defaultRoles'    => ['guest'],
        ],
    ],
    'params' => $params,
];
