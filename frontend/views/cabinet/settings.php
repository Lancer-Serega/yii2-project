<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 02.11.18
 * Time: 15:37
 */

use lo\widgets\Toggle;
use yii\helpers\Url;

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
            <div class="settings-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#settings-base"><?= Yii::t('content', 'Basic'); ?></a></li>
                    <li><a data-toggle="tab" href="#settings-notifications"><?= Yii::t('content', 'Notifications'); ?></a></li>
                </ul>

                <div class="tab-content">
                    <div id="settings-base" class="tab-pane fade in active">
                        <br>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                            <?= Yii::t('content', 'Two-factor authorization'); ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <table class="table table-hover" id="table-auth-two-factor">
                                            <tr>
                                                <td>
                                                    <?= Toggle::widget([
                                                        'name' => 'two-factor-authorization.enable',
                                                        'checked' => true,
                                                        'options' => [],
                                                    ]); ?>
                                                </td>
                                                <td>
                                                    <?= Yii::t('content', 'When you turn on two-factor authentication, you will receive a one-time confirmation code in the mail every time you log into the system.'); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?= Toggle::widget([
                                                        'name' => 'two-factor-authorization.enable',
                                                        'checked' => true,
                                                        'options' => [
                                                            'data-on' => 'True',
                                                            'data-off' => 'False',
                                                        ],
                                                    ]); ?>
                                                </td>
                                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus accusantium aliquid commodi cupiditate, delectus, dolores eveniet explicabo, labore magni maiores neque nesciunt numquam odio pariatur repudiandae sunt voluptatem voluptatibus.</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?= Toggle::widget([
                                                        'name' => 'some-group.some-settings-1',
                                                        'checked' => false,
                                                        'options' => [
                                                            'data-on' => 'Good',
                                                            'data-off' => 'Bad',
                                                        ],
                                                    ]); ?>
                                                </td>
                                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus distinctio earum nesciunt odio recusandae suscipit voluptatem! Ab distinctio dolorem doloremque eaque expedita fugit, nulla praesentium quos ut velit. Et, maiores?</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?= Toggle::widget([
                                                        'name' => 'some-group.some-settings-1',
                                                        'checked' => false,
                                                        'options' => [
                                                            'data-on' => '1',
                                                            'data-off' => '0',
                                                        ],
                                                    ]); ?>
                                                </td>
                                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut blanditiis culpa, eius error in libero mollitia nisi optio repellendus reprehenderit sint, velit voluptate. Animi cumque ea excepturi hic quasi voluptatem.</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?= Toggle::widget([
                                                        'name' => 'some-group.some-settings-1',
                                                        'checked' => true,
                                                        'options' => [
                                                            'data-on' => 'True',
                                                            'data-off' => 'False',
                                                            'data-size' => 'small',
                                                            'data-onstyle' => 'primary',
                                                            'data-offstyle' => 'warning',
                                                        ],
                                                    ]); ?>
                                                </td>
                                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus blanditiis, corporis dolorem error explicabo hic in incidunt minima repellat sed similique sit temporibus voluptatum! Cupiditate eligendi nobis obcaecati odio omnis.</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?= Toggle::widget([
                                                        'name' => 'some-group.some-settings-1',
                                                        'checked' => true,
                                                        'options' => [
                                                            'data-on' => 'True',
                                                            'data-off' => 'False',
                                                            'data-size' => 'small',
                                                            'data-onstyle' => 'primary',
                                                            'data-offstyle' => 'info',
                                                        ],
                                                    ]); ?>
                                                </td>
                                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias consectetur corporis, delectus dicta ipsam nulla odio optio praesentium quas quod rerum saepe temporibus tenetur veritatis vitae voluptatem? Minus, velit!</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?= Toggle::widget([
                                                        'name' => 'some-group.some-settings-1',
                                                        'checked' => false,
                                                        'options' => [
                                                            'data-on' => 'True',
                                                            'data-off' => 'False',
                                                            'data-size' => 'small',
                                                        ],
                                                    ]); ?>
                                                </td>
                                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dicta, doloribus facilis id magni perspiciatis quia quo reiciendis, repellat soluta totam unde veritatis, vero? Deserunt maxime quisquam quod temporibus unde!</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                            <?= Yii::t('content', 'Authorization history'); ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table table-hover" id="table-auth-history">
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="settings-notifications" class="tab-pane fade">
                        <br>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                            <?= Yii::t('content', 'Two-factor authorization'); ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <table class="table table-hover" id="table-auth-two-factor">
                                    <tr>
                                        <td>
                                            <?= Toggle::widget([
                                                'name' => 'two-factor-authorization.enable',
                                                'checked' => true,
                                                'options' => [],
                                            ]); ?>
                                        </td>
                                        <td>
                                            <?= Yii::t('content', 'When you turn on two-factor authentication, you will receive a one-time confirmation code in the mail every time you log into the system.'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= Toggle::widget([
                                                'name' => 'two-factor-authorization.enable',
                                                'checked' => true,
                                                'options' => [
                                                    'data-on' => 'True',
                                                    'data-off' => 'False',
                                                ],
                                            ]); ?>
                                        </td>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus accusantium aliquid commodi cupiditate, delectus, dolores eveniet explicabo, labore magni maiores neque nesciunt numquam odio pariatur repudiandae sunt voluptatem voluptatibus.</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= Toggle::widget([
                                                'name' => 'some-group.some-settings-1',
                                                'checked' => false,
                                                'options' => [
                                                    'data-on' => 'Good',
                                                    'data-off' => 'Bad',
                                                ],
                                            ]); ?>
                                        </td>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus distinctio earum nesciunt odio recusandae suscipit voluptatem! Ab distinctio dolorem doloremque eaque expedita fugit, nulla praesentium quos ut velit. Et, maiores?</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= Toggle::widget([
                                                'name' => 'some-group.some-settings-1',
                                                'checked' => false,
                                                'options' => [
                                                    'data-on' => '1',
                                                    'data-off' => '0',
                                                ],
                                            ]); ?>
                                        </td>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut blanditiis culpa, eius error in libero mollitia nisi optio repellendus reprehenderit sint, velit voluptate. Animi cumque ea excepturi hic quasi voluptatem.</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= Toggle::widget([
                                                'name' => 'some-group.some-settings-1',
                                                'checked' => true,
                                                'options' => [
                                                    'data-on' => 'True',
                                                    'data-off' => 'False',
                                                    'data-size' => 'small',
                                                    'data-onstyle' => 'primary',
                                                    'data-offstyle' => 'warning',
                                                ],
                                            ]); ?>
                                        </td>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus blanditiis, corporis dolorem error explicabo hic in incidunt minima repellat sed similique sit temporibus voluptatum! Cupiditate eligendi nobis obcaecati odio omnis.</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= Toggle::widget([
                                                'name' => 'some-group.some-settings-1',
                                                'checked' => true,
                                                'options' => [
                                                    'data-on' => 'True',
                                                    'data-off' => 'False',
                                                    'data-size' => 'small',
                                                    'data-onstyle' => 'primary',
                                                    'data-offstyle' => 'info',
                                                ],
                                            ]); ?>
                                        </td>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias consectetur corporis, delectus dicta ipsam nulla odio optio praesentium quas quod rerum saepe temporibus tenetur veritatis vitae voluptatem? Minus, velit!</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= Toggle::widget([
                                                'name' => 'some-group.some-settings-1',
                                                'checked' => false,
                                                'options' => [
                                                    'data-on' => 'True',
                                                    'data-off' => 'False',
                                                    'data-size' => 'small',
                                                ],
                                            ]); ?>
                                        </td>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam dicta, doloribus facilis id magni perspiciatis quia quo reiciendis, repellat soluta totam unde veritatis, vero? Deserunt maxime quisquam quod temporibus unde!</td>
                                    </tr>
                                </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                            <?= Yii::t('content', 'Authorization history'); ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table table-hover" id="table-auth-history">
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
