<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 02.11.18
 * Time: 15:37
 */

$this->title = Yii::t('menu', 'Index');

require_once __DIR__ . '/../layouts/alert.php';

echo "<h1>Name: $this->title</h1>";
echo "<h1>$response</h1>";