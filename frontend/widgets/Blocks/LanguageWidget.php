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
        return $this->render('/language', [
            'currentLang' => LangModel::getCurrent(),
            'langs' => LangModel::find()
                ->where('id != :current_id', [':current_id' => LangModel::getCurrent()->id])
                ->all()
        ]);
    }
}