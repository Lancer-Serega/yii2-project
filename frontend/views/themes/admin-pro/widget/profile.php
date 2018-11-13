<?php
use \yii\helpers\Url;
use \yii\helpers\Html;
?>

<?php if (!Yii::$app->user->getIdentity()): ?>
    <div style="display: inline-flex; margin-top: 20px; justify-content: space-around; width: 105%;">
        <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target=".bs-modal-login"><i class="mdi mdi-account-key"></i> Login</button>
        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-modal-signin"><i class="mdi mdi-account-plus"></i> Sing In</button>
    </div>

<?php else: ?>
    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="<?= Url::to($this->theme->getUrl('/images/User-Icon.ico')); ?>" alt="user" class="profile-pic"/>
    </a>
<?php endif; ?>
<div class="dropdown-menu dropdown-menu-right animated flipInY">
    <ul class="dropdown-user">
        <li>
            <div class="dw-user-box">
                <div class="u-img">
                    <img src="<?= Url::to($this->theme->getUrl('/assets/images/users/1.jpg')); ?>" alt="user">
                </div>
                <div class="u-text">
                    <h4>Steave Jobs</h4>
                    <p class="text-muted">varun@gmail.com</p>
                    <a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">
                        View Profile
                    </a>
                </div>
            </div>
        </li>

        <li role="separator" class="divider"></li>

        <li>
            <a href="#">
                <i class="ti-user"></i>
                My Profile
            </a>
        </li>

        <li>
            <a href="#">
                <i class="ti-wallet"></i>
                My Balance
            </a>
        </li>

        <li>
            <a href="#">
                <i class="ti-email"></i>
                Inbox
            </a>
        </li>

        <li role="separator" class="divider"></li>

        <li>
            <?= Html::a('<i class="ti-settings"></i>' . Yii::t('form', 'Account Setting'), '/settings'); ?>
        </li>

        <li role="separator" class="divider"></li>

        <li>
            <?= Html::a('<i class="fa fa-power-off"></i>' . Yii::t('form', 'Logout'), '/logout'); ?>
        </li>
    </ul>
</div>