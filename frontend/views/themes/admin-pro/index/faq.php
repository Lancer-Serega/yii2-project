<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 12.11.18
 * Time: 12:54
 */

use frontend\widgets\Alert;
use \yii\helpers\Url;
use \yii\widgets\Breadcrumbs;
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
            echo Alert::widget() . '<br/>';
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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Fix-header-sidebar</li>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs'] ?? [],]); ?>
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
