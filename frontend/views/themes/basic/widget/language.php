<?php

/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 26.10.18
 * Time: 12:53
 */

use frontend\components\LangRequest;
use frontend\models\Entity\LanguageEntity;
use yii\helpers\Html;

/**
 * @var LangRequest $request
 * @var LanguageEntity $currentLanguage
 * @var LanguageEntity[] $languageList
 */


?>
<div class="language">
    <button class="language__btn">
        <span class="icon-language-<?= $currentLanguage->url; ?>"></span>
        <?= $currentLanguage->name; ?>
        <svg class="icon-arrow-down">
            <use xlink:href="<?= $this->theme->getUrl('/sprites/sprite.svg#icon-arrow-down'); ?>"></use>
        </svg>
    </button>
    <div class="language__select">
        <?php foreach ($languageList as $language): ?>
            <?php $text = '<span class="icon-language-' . $language->url . '"></span>' . $language->name; ?>
            <?= Html::a($text, "/language/switch/{$language->url}", ['class' => 'language__option']); ?>
        <?php endforeach; ?>
    </div>
</div>