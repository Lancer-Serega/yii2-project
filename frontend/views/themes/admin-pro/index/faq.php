<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 12.11.18
 * Time: 12:54
 */

use frontend\widgets\AlertWidget;
use \yii\helpers\Url;
use \frontend\widgets\BreadcrumbsWidget;
?>

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Alerts -->
    <!-- ============================================================== -->
    <div class="alert-block">
        <?php if (count(Yii::$app->session->getAllFlashes())) {
            echo AlertWidget::widget() . '<br/>';
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
            <h3 class="text-themecolor">Fix-header-sidebar</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <?= BreadcrumbsWidget::widget([
                    'links' => $this->params['breadcrumbs'] ?? [],
                    ]);
                ?>
            </ol>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2>Hello faq page!</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
