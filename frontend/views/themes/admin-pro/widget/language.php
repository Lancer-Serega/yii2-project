<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 12.11.18
 * Time: 17:46
 */

use frontend\components\LangRequest;
use frontend\models\Entity\LanguageEntity;
use \yii\helpers\Html;

/**
 * @var LangRequest $request
 * @var LanguageEntity $currentLanguage
 * @var LanguageEntity[] $languageList
 */

$request = \Yii::$app->getRequest();
?>

<!-- ============================================================== -->
<!-- Language -->
<!-- ============================================================== -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="flag-icon flag-icon-<?= $currentLanguage->url === 'en' ? 'us' : $currentLanguage->url; ?>"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right animated bounceInDown">
        <?php foreach ($languageList as $language): ?>
            <?php $code = $language->url === 'en' ? 'us' : $language->url; ?>
            <?php $text = '<i class="flag-icon flag-icon-' . $code . '"></i>' . $language->name; ?>
            <?= Html::a($text, "/language/switch/{$language->url}", ['class' => 'dropdown-item']); ?>
        <?php endforeach; ?>
    </div>
</li>
<!-- ============================================================== -->
<!-- END Language -->
<!-- ============================================================== -->
