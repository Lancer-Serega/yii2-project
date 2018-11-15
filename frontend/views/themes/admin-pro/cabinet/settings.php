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
        <!-- ============================================================== -->
        <!-- Alerts -->
        <!-- ============================================================== -->
        <div class="alert-block">
            <?php if (count(Yii::$app->session->getAllFlashes())) {
                echo \frontend\widgets\Alert::widget() . '<br/>';
            } ?>
        </div>
        <!-- ============================================================== -->
        <!-- END Alerts -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor"><?= Yii::t('menu', 'Settings'); ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <?= \yii\widgets\Breadcrumbs::widget([
                    'activeItemTemplate' => "<li class=\"breadcrumb-item\"><i>{link}</i></li>\n",
                    'itemTemplate' => "<li class=\"breadcrumb-item\"><i>{link}</i></li>\n",
                    'links' => $this->params['breadcrumbs'] ?? [],
                ]);
                ?>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Security :: Start-->
                        <div class="security">
                            <div class="container-fluid">
                                <div class="settings__grid">
                                    <?= UserChangeAccount::widget(['formUrl' => Url::to(['/cabinet/settings-save'])]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Settings :: End-->
