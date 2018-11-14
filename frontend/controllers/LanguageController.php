<?php

namespace frontend\controllers;

use frontend\models\Language;
use frontend\models\User;
use yii\web\Cookie;

/**
 * Language controller
 */
class LanguageController extends BaseController
{
    /**
     * @return mixed
     * @throws \Throwable
     */
    public function actionSwitch()
    {
        $language = \Yii::$app->getRequest()->getQueryParam('lang');
        $language = Language::getLangByUrl(['url' => $language]);
        if (!$language) {
            $language = Language::getDefaultLang();
        }

        $cookie = new Cookie([
            'name' => 'language',
            'value' => $language->url,
        ]);
        \Yii::$app->response->cookies->add($cookie);

        /**
         * @var User $user
         */
        $user = \Yii::$app->user->getIdentity();
        if ($user) {
            $user->switchLanguage($language);
        }

        return $this->redirect(\Yii::$app->request->referrer);
    }
}