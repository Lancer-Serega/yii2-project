<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 02.11.18
 * Time: 15:37
 */

use yii\helpers\Url;

$this->title = Yii::t('menu', 'Account');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => [Url::to('/cabinet')]];
$this->title = Yii::t('menu', 'Security');
$this->params['breadcrumbs'][] = $this->title;
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
            <h3 class="text-themecolor"><?= Yii::t('menu', 'Security'); ?></h3>
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

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Security :: Start-->
                    <div class="security">
                        <div class="container-fluid">
                            <div class="security__grid">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="tab" href="#security-two-factor" role="tab" aria-selected="true">
                                            <span>
                                                <i class="fas fa-key"></i>
                                                <?= Yii::t('content', 'Two-factor authorization'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#security-auth-history" role="tab" aria-selected="false">
                                            <span>
                                                <i class="mdi mdi-history"></i>
                                                <?= Yii::t('content', 'Authorization history'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#security-empty-tab" role="tab" aria-selected="false">
                                            <span>
                                                <i class="fas fa-battery-empty"></i>
                                                <?= Yii::t('content', 'Empty tab'); ?>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active show" id="security-two-factor" role="tabpanel">
                                        <table class="table table-hover">
                                            <tr>
                                                <td>
                                                    <div class="col-md-4">
                                                        <div class="switch">
                                                            <label style="display: inline-flex;"><span class="text-danger">OFF</span><input type="checkbox" checked><span class="lever"></span><span class="text-success">ON</span></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?= Yii::t('content', 'When you turn on two-factor authentication, you will receive a one-time confirmation code in the mail every time you log into the system.'); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="tab-pane p-20" id="security-auth-history" role="tabpanel">
                                        <table class="table table-hover">
                                            <tr>
                                                <td>
                                                    <span class="history-auth-date">
                                                        <?= date('F jS, Y h:i:s', strtotime(time())); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="history-auth-browser">
                                                        <?= $_SERVER['HTTP_USER_AGENT']; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="history-auth-date">
                                                        <?= date('F jS, Y h:i:s', strtotime(time())); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="history-auth-browser">
                                                        <?= $_SERVER['HTTP_USER_AGENT']; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="history-auth-date">
                                                        <?= date('F jS, Y h:i:s', strtotime(time())); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="history-auth-browser">
                                                        <?= $_SERVER['HTTP_USER_AGENT']; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="history-auth-date">
                                                        <?= date('F jS, Y h:i:s', strtotime(time())); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="history-auth-browser">
                                                        <?= $_SERVER['HTTP_USER_AGENT']; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="history-auth-date">
                                                        <?= date('F jS, Y h:i:s', strtotime(time())); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="history-auth-browser">
                                                        <?= $_SERVER['HTTP_USER_AGENT']; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="history-auth-date">
                                                        <?= date('F jS, Y h:i:s', strtotime(time())); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="history-auth-browser">
                                                        <?= $_SERVER['HTTP_USER_AGENT']; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="history-auth-date">
                                                        <?= date('F jS, Y h:i:s', strtotime(time())); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="history-auth-browser">
                                                        <?= $_SERVER['HTTP_USER_AGENT']; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="history-auth-date">
                                                        <?= date('F jS, Y h:i:s', strtotime(time())); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="history-auth-browser">
                                                        <?= $_SERVER['HTTP_USER_AGENT']; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="history-auth-date">
                                                        <?= date('F jS, Y h:i:s', strtotime(time())); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="history-auth-browser">
                                                        <?= $_SERVER['HTTP_USER_AGENT']; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="history-auth-date">
                                                        <?= date('F jS, Y h:i:s', strtotime(time())); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="history-auth-browser">
                                                        <?= $_SERVER['HTTP_USER_AGENT']; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="history-auth-date">
                                                        <?= date('F jS, Y h:i:s', strtotime(time())); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="history-auth-browser">
                                                        <?= $_SERVER['HTTP_USER_AGENT']; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="history-auth-date">
                                                        <?= date('F jS, Y h:i:s', strtotime(time())); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="history-auth-browser">
                                                        <?= $_SERVER['HTTP_USER_AGENT']; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane p-20" id="security-empty-tab" role="tabpanel"><h2>security-empty-tab</h2></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Security :: End-->
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


