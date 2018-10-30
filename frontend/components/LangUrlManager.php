<?php

namespace frontend\components;

use frontend\models\Lang;
use yii\web\UrlManager;

class LangUrlManager extends UrlManager
{
    /**
     * Prepare url for internationalization (/index/about --> /en/index/about)
     * @param array|string $params
     * @return string
     */
    public function createUrl($params)
    {
        if( isset($params['lang_id']) ){
            // If the language identifier is specified,
            // then we try to find the language in the database,
            // otherwise we work with the default language.
            $lang = Lang::findOne($params['lang_id']);
            if( $lang === null ){
                $lang = Lang::getDefaultLang();
            }

            unset($params['lang_id']);
        } else {
            // If the language parameter is not specified, then we work with the current language.
            $lang = Lang::getCurrent();
        }

        $url = parent::createUrl($params);

        return $url === '/'
            ? "/{$lang->url}"
            : "/{$lang->url}$url";
    }
}