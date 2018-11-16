<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 26.10.18
 * Time: 12:52
 */

namespace frontend\widgets\Blocks;

use frontend\models\Entity\Language as LangModel;
use frontend\widgets\BaseWidget;

class LanguageWidget extends BaseWidget
{
    public function run() {
        return $this->render('/language', [
            'currentLang' => LangModel::getCurrent(),
            'langs' => LangModel::find()
                ->where('id != :current_id', [':current_id' => LangModel::getCurrent()->id])
                ->all()
        ]);
    }
}