<?php

use yii\base\InvalidConfigException;
use yii\web\Application;
use yii\helpers\ArrayHelper;

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

try {
    require __DIR__ . '/../../vendor/autoload.php';
    require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';
    require __DIR__ . '/../../common/config/bootstrap.php';
    require __DIR__ . '/../config/bootstrap.php';

    $config = ArrayHelper::merge(
        require __DIR__ . '/../../common/config/main.php',
        require __DIR__ . '/../../common/config/main-local.php',
        require __DIR__ . '/../config/main.php',
        require __DIR__ . '/../config/main-local.php'
    );

    $app = new Application($config);
    $app->run();
} catch (InvalidConfigException $e) {
    if (YII_DEBUG) {
        echo $e->getMessage() . PHP_EOL;
    }
    exit('Error application!');
}
