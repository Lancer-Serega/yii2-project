<?php

namespace frontend\widgets;

use yii\bootstrap\Widget;

/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 12.11.18
 * Time: 15:46
 */

class BaseWidget extends Widget
{
    public function render($view, $option = [])
    {
        $view = \Yii::$app->view->theme->getBaseUrl() . '/widget' . $view;
        return parent::render($view, $option);
    }
}