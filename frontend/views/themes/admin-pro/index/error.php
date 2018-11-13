<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="container-fluid">
    <div class="site-error">

        <h1><?= Html::encode($this->title); ?></h1>

        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)); ?>
        </div>

        <p>
            <?= Yii::t('error', 'The above error occurred while the Web server was processing your request.'); ?>
        </p>
        <p>
            <?= Yii::t('error', 'Please contact us if you think this is a server error.'); ?>
            <?= Yii::t('error', 'Thank you.'); ?>
        </p>

    </div>
</div>