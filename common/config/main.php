<?php

use yii\caching\FileCache;
use yii\rbac\DbManager;

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],

    'vendorPath' => dirname(__DIR__, 2) . '/vendor',

    'components' => [
        'cache' => [
            'class' => FileCache::class,
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
];
