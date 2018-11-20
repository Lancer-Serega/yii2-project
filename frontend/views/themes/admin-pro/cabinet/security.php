<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 02.11.18
 * Time: 15:37
 */

/**
 * @var View $this
 * @var LogUserAuthEntity[] $userAuthHistoryList
 * @var array $userConfig
 */

use \frontend\models\Entity\LogUserAuthEntity;
use \frontend\widgets\AlertWidget;
use \yii\helpers\Url;
use \yii\web\View;
use \yii\web\YiiAsset;
use \frontend\widgets\BreadcrumbsWidget;

$this->title = Yii::t('menu', 'Account');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => [Url::to('/cabinet')]];
$this->title = Yii::t('menu', 'Security');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile($this->theme->getBaseUrl() . '/js/switch.js', ['position' => $this::POS_END, 'depends' => YiiAsset::class]);
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
            <h3 class="text-themecolor"><?= Yii::t('menu', 'Security'); ?></h3>
        </div>
        <div class="col-md-7 align-self-center">
            <?= BreadcrumbsWidget::widget(['links' => $this->params['breadcrumbs'] ?? []]); ?>
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
                                                            <label style="display: inline-flex;">
                                                                <span class="text-danger">OFF</span>
                                                                <input type="checkbox" data-type="switch-checkbox" data-url="<?= Url::to(['user-security/change-two-factor-auth']); ?>" id="security-two-factor-switch"<?= $userConfig['two_factor_auth'] ? ' checked' : ''; ?>>
                                                                <span class="lever"></span>
                                                                <span class="text-success">ON</span>
                                                            </label>
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
                                            <?php foreach($userAuthHistoryList as $userAuthHistory):
                                                $date = new \DateTime($userAuthHistory->timestamp);
                                                $authDate = \Yii::$app->formatter->asDatetime($date, 'long');
                                                $time = \Yii::$app->formatter->asTime($date, 'long');
                                                $date = \Yii::$app->formatter->asDate($date, 'long');
                                                if (!empty($date) ||!empty($time)) {
                                                    $authDate = "<span class=\"date\">{$date}</span><br><span class=\"time\">{$time}</span>";
                                                }
                                            ?>
                                                <tr>
                                                    <td>
                                                        <span class="history-auth-date">
                                                            <span class="datetime">
                                                                <?= $authDate; ?>
                                                            </span>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="history-auth-browser">
                                                            <?= $userAuthHistory->user_agent; ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
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


