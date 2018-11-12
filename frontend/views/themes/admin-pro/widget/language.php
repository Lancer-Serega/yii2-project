<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 12.11.18
 * Time: 17:46
 */

use frontend\components\LangRequest;
use frontend\models\Lang;
use \yii\helpers\Html;

/**
 * @var LangRequest $request
 * @var Lang $currentLang
 * @var Lang[] $langs
 */

$request = \Yii::$app->getRequest();
$langUrl = $request->getLangUrl();
?>

<!-- ============================================================== -->
<!-- Language -->
<!-- ============================================================== -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="flag-icon flag-icon-<?= $currentLang->url === 'en' ? 'us' : $currentLang->url; ?>"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right animated bounceInDown">
        <?php foreach ($langs as $lang): ?>
            <?php $text = '<i class="flag-icon flag-icon-' . $lang->url . '"></i>' . $lang->name; ?>
            <?= Html::a($text, "/{$lang->url}{$langUrl}", ['class' => 'dropdown-item']); ?>
        <?php endforeach; ?>
    </div>
</li>
<!-- ============================================================== -->
<!-- END Language -->
<!-- ============================================================== -->
