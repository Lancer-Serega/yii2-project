<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 26.10.18
 * Time: 12:52
 */

namespace frontend\widgets;
use frontend\models\Lang as LangModel;

class Lang extends \yii\bootstrap\Widget
{
    public $app;

    public function init(){}

    public function run() {
        return $this->render('lang/view', [
            'currentLang' => LangModel::getCurrent(),
            'langs' => LangModel::find()
                ->where('id != :current_id', [':current_id' => LangModel::getCurrent()->id])
                ->all()
        ]);
    }
}