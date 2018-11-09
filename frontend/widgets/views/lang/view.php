<?php

/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 26.10.18
 * Time: 12:53
 */

use frontend\components\LangRequest;
use frontend\models\Lang;
use yii\helpers\Html;

/**
 * @var LangRequest $request
 * @var Lang $currentLang
 * @var Lang[] $langs
 */

$request = \Yii::$app->getRequest();
$langUrl = $request->getLangUrl();
?>
<div class="language">
    <button class="language__btn">
        <span class="icon-language-<?= $currentLang->url; ?>"></span>
        <?= $currentLang->name; ?>
        <svg class="icon-arrow-down">
            <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-arrow-down'); ?>"></use>
        </svg>
    </button>
    <div class="language__select">
        <?php foreach ($langs as $lang): ?>
            <?php $text = '<span class="icon-language-' . $lang->url . '"></span>' . $lang->name; ?>
            <?= Html::a($text, "/{$lang->url}{$langUrl}", ['class' => 'language__option']); ?>
        <?php endforeach; ?>
    </div>
</div>