<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 02.11.18
 * Time: 15:37
 */

use yii\helpers\Url;
use \frontend\widgets\Blocks\UserChangeAccount;

$this->title = Yii::t('menu', 'Account');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => [Url::to('/cabinet')]];
$this->title = Yii::t('menu', 'Settings');
$this->params['breadcrumbs'][] = $this->title;

?>

<!-- Settings :: Start-->
<div class="settings">
    <div class="container-fluid">
        <h2 class="settings__heading"><?= Yii::t('menu', 'Settings'); ?></h2>
        <div class="settings__grid">
            <?= UserChangeAccount::widget(['formUrl' => Url::to(['/cabinet/settings-save'])]); ?>
        </div>
    </div>
</div>
<!-- Settings :: End-->
