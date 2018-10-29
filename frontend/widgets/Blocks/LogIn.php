<?php
namespace frontend\widgets\Blocks;

use Yii;
use yii\bootstrap\Widget;

class LogIn extends Widget
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return '
            <!-- Popups LogIn:: Start-->
            <div class="popup" id="popup-login" style="display: none;">
                <span class="popup__close" data-fancybox-close>
                    <svg class="icon-close">
                        <use xlink:href="sprites/sprite.svg#icon-close"></use>
                    </svg>
                </span>
                
                <span class="popup__heading">Some text...</span>
                
                <div class="popup__container">
                    <div class="auth">
                        <div class="row">
                            <div class="col-md-12 pull-md-12">
                                <div class="auth__reg">
                                    <div class="ui-form">
                                        <form class="js-validate" action="#">
                                            <span class="ui-legend">
                                                ' . Yii::t('app', 'Authorization form'). '
                                            </span>
                                            
                                            <div class="auth__social">
                                                <p class="auth__social-text">' . Yii::t('app', 'Log In via') . '</p>
                                                <div class="auth__social-control">
                                                    <a class="auth__social-btn" href="#">
                                                        <span class="icon-social-fb"></span>
                                                    </a>
                                                    <a class="auth__social-btn" href="#">
                                                        <span class="icon-social-tw"></span>
                                                    </a>
                                                    <a class="auth__social-btn" href="#">
                                                        <span class="icon-social-gp"></span>
                                                    </a>
                                                    <a class="auth__social-btn" href="#">
                                                        <span class="icon-social-vk"></span>
                                                    </a>
                                                </div>
                                            </div>
                                
                                            <div class="ui-field">
                                                <input class="ui-input" type="email" name="email" placeholder="' . Yii::t('app', 'Email'). '">
                                            </div>
                                            
                                            <div class="ui-field">
                                                <input class="ui-input" type="password" name="password" placeholder="' . Yii::t('app', 'Password'). '">
                                            </div>
                                            
                                            <div class="ui-field">
                                                <label class="ui-check">
                                                    <input class="ui-check__input" type="checkbox" checked>
                                                    <span class="ui-check__checkbox">
                                                        <svg class="icon-check">
                                                          <use xlink:href="sprites/sprite.svg#icon-check"></use>
                                                        </svg>
                                                    </span>' . Yii::t('app', 'Remember me'). '
                                                </label>
                                            </div>
                                            
                                            <button class="btn btn--block btn--green">' . Yii::t('app', 'Create account'). '</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Popups LogIn:: End-->
        ';
    }
}
