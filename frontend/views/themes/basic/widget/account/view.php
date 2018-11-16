<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 02.11.18
 * Time: 13:31
 */

/**
 * @var User $user
 */

use frontend\models\Entity\User;
use \yii\helpers\Url;
use \yii\helpers\Html;
?>


<?php if (Yii::$app->user->isGuest): ?>
    <div class="signin">
        <div class="signin__dropdown">
            <a class="btn btn--36 btn--green-empty" href="#" data-fancybox data-src="#popup-login"><?= Yii::t('form', 'Log In'); ?></a>
            <a class="btn btn--36 btn--green-link" href="#" data-fancybox data-src="#popup-signin"><?= Yii::t('form', 'Sign In'); ?></a>
        </div>
    </div>
<?php else: ?>
    <div class="signin">
        <div class="signin__btn dropdown-toggle" id="dropdownUserMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg class="icon-signin">
                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-signin'); ?>"></use>
            </svg>
            <svg class="icon-arrow-down">
                <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-arrow-down'); ?>"></use>
            </svg>
        </div>
        <div class="dropdown-menu" aria-labelledby="dropdownUserMenuButton">
            <div class="dropdown-header"><?= Yii::t('menu', 'Menu'); ?></div>

            <a class="dropdown-item" href="<?= Url::to(['/cabinet/account']); ?>">
                <span class="dropdown-item-res"><?= Yii::t('menu', 'Account'); ?></span>
            </a>
            <a class="dropdown-item" href="<?= Url::to(['/cabinet/active-tariffs']); ?>">
                <span class="dropdown-item-res"><?= Yii::t('menu', 'Active Tariffs'); ?></span>
            </a>
            <a class="dropdown-item" href="<?= Url::to(['/cabinet/tariffs']) ;?>">
                <span class="dropdown-item-res"><?= Yii::t('menu', 'Tariffs'); ?></span>
            </a>
            <a class="dropdown-item" href="<?= Url::to(['/cabinet/trial-period']) ;?>">
                <span class="dropdown-item-res"><?= Yii::t('menu', 'Trial period'); ?></span>
            </a>
            <a class="dropdown-item" href="<?= Url::to(['/cabinet/support']) ;?>">
                <span class="dropdown-item-res"><?= Yii::t('menu', 'Support'); ?></span>
            </a>
            <a class="dropdown-item" href="<?= Url::to(['/cabinet/faq']) ;?>">
                <span class="dropdown-item-res"><?= Yii::t('menu', 'FAQ'); ?></span>
            </a>

            <div class="dropdown-divider"></div>
            <div class="dropdown-header"><?= !empty($user->username) ? Html::encode($user->username) : $user->email; ?></div>

            <a class="dropdown-item" href="<?= Url::to(['/cabinet/settings']) ;?>">
                <span class="dropdown-item-res color-blue"><?= Yii::t('menu', 'Settings'); ?></span>
            </a>
            <a class="dropdown-item" href="<?= Url::to(['/cabinet/security']) ;?>">
                <span class="dropdown-item-res color-blue"><?= Yii::t('menu', 'Security'); ?></span>
            </a>
            <a class="dropdown-item" href="<?= Url::to(['/cabinet/finance-operations']) ;?>">
                <span class="dropdown-item-res color-blue"><?= Yii::t('menu', 'Finance operations'); ?></span>
            </a>
            <a class="dropdown-item" href="<?= Url::to(['/logout']); ?>">
                <span class="dropdown-item-res color-red">
                    <?= Yii::t('form', 'Log Out'); ?>
                </span>
            </a>
        </div>
    </div>
<?php endif; ?>