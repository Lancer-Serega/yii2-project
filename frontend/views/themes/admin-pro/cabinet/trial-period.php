<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 02.11.18
 * Time: 15:37
 */

$this->title = Yii::t('menu', 'Account');
$this->params['breadcrumbs'][] = $this->title;
$this->title = Yii::t('menu', 'Trial period');
$this->params['breadcrumbs'][] = $this->title;

echo "<h1>Name: $this->title</h1>";
echo "<h1>$response</h1>";