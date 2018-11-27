<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 26.10.18
 * Time: 12:52
 */

namespace frontend\widgets\Blocks;

use frontend\models\Entity\LanguageEntity as LangModel;
use frontend\widgets\BaseWidget;

class LanguageWidget extends BaseWidget
{
    /**
     * @return string
     * @throws \Throwable
     */
    public function run(): string
    {
        $currentLanguageId = LangModel::getCurrent()->id;
        $placeholders = [':current_id' => $currentLanguageId];
        $languageList = LangModel::find()->where('id != :current_id', $placeholders)->all();

        return $this->render('/language', [
            'currentLanguage' => LangModel::getCurrent(),
            'languageList' => $languageList
        ]);
    }
}