<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 02.11.18
 * Time: 15:37
 */

use yii\helpers\Url;
use \frontend\widgets\Blocks\UserChangeAccountWidget;
use \frontend\widgets\BreadcrumbsWidget;

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
                echo \frontend\widgets\AlertWidget::widget() . '<br/>';
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
                <?= BreadcrumbsWidget::widget([
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
                                    <?= UserChangeAccountWidget::widget(['formUrl' => Url::to(['/cabinet/settings-save'])]); ?>
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
