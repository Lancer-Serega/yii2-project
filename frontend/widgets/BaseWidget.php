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
    /**
     * @param string $view
     * @param array $option
     * @return string
     */
    public function render($view, $option = []): string
    {
        $baseUrl = \Yii::$app->view->theme->getBaseUrl();
        $view = $baseUrl . '/widget' . $view;
        return parent::render($view, $option);
    }
}
