<?php
namespace frontend\widgets\Blocks;

use Yii;
use yii\bootstrap\Widget;
use yii\helpers\Url;

class HeaderMenu extends Widget
{
    /**
     * @var string 
     */
    public $route;
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $class = [
            'index'    => $this->route === 'index/index'     ? ' is-active' : '',
            'tariff'   => Yii::$app->controller->id === 'tariff' ? ' is-active' : '',
            'feedback' => $this->route === 'index/feedback'  ? ' is-active' : '',
            'blog'     => Yii::$app->controller->id === 'blog'   ? ' is-active' : '',
            'faq'      => $this->route === 'index/faq'       ? ' is-active' : '',
            'about'    => $this->route === 'index/about'     ? ' is-active' : '',
        ];

        $link = [
            'index'    => Url::to('/', true),
            'tariff'   => Url::to(['tariff/index']),
            'feedback' => Url::to(['index/feedback']),
            'blog'     => Url::to(['blog/index']),
            'faq'      => Url::to(['index/faq']),
            'about'    => Url::to(['index/about']),
        ];

        $text = [
            'index'    => Yii::t('app', 'Homepage'),
            'tariff'   => Yii::t('app', 'Tariffs'),
            'feedback' => Yii::t('app', 'Reviews'),
            'blog'     => Yii::t('app', 'Blog'),
            'faq'      => Yii::t('app', 'FAQ'),
            'about'    => Yii::t('app', 'About Us'),
        ];

        return '
            <nav class="nav">
                <button class="nav__btn"><span></span><span></span><span></span></button>
                <div class="nav__dropdown">
                    <ul class="nav__menu">
                        <li>
                            <a class="nav__link ' . $class['index'] . '" 
                               href="' . $link['index'] . ' "
                            >' . $text['index'] . '</a>
                        </li>
                        
                        <li>
                            <a class="nav__link ' . $class['tariff'] . '" 
                               href="' . $link['tariff'] . ' "
                            >' . $text['tariff'] . '</a>
                        </li>
                        
                        <li>
                            <a class="nav__link ' . $class['feedback'] . '" 
                               href="' . $link['feedback'] . ' "
                            >' . $text['feedback'] . '</a>
                        </li>
                        
                        <li>
                            <a class="nav__link ' . $class['blog'] . '" 
                               href="' . $link['blog'] . ' "
                            >' . $text['blog'] . '</a>
                        </li>
                        
                        <li>
                            <a class="nav__link ' . $class['faq'] . '" 
                               href="' . $link['faq'] . '">
                            ' . $text['faq'] . '</a>
                        </li>
                        
                        <li>
                            <a class="nav__link ' . $class['about'] . '" 
                               href="' . $link['about'] . ' "
                            >' . $text['about'] . '</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        ';
    }
}
