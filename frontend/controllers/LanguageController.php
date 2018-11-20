<?php

namespace frontend\controllers;

use frontend\models\Entity\LanguageEntity;
use frontend\models\Entity\UserEntity;
use yii\web\Cookie;
use yii\web\Response;

/**
 * Class LanguageController
 * @package frontend\controllers
 */
class LanguageController extends BaseController
{
    /**
     * Saving switch language.
     *
     * @return Response
     * @throws \Throwable
     */
    public function actionSwitch(): Response
    {
        $language = \Yii::$app->getRequest()->getQueryParam('language');
        $language = LanguageEntity::getLangByUrl($language);
        if (!$language) {
            $language = LanguageEntity::getDefaultLang();
        }

        $cookie = new Cookie([
            'name' => 'language',
            'value' => $language->url,
        ]);
        \Yii::$app->response->cookies->add($cookie);

        /**
         * @var UserEntity $user
         */
        $user = \Yii::$app->user->getIdentity();
        if ($user) {
            $user->switchLanguage($language);
        }

        return $this->redirect(\Yii::$app->request->referrer);
    }
}
