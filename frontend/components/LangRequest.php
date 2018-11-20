<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 26.10.18
 * Time: 12:41
 */

namespace frontend\components;

use yii\base\InvalidConfigException;
use yii\web\Cookie;
use yii\web\Request;
use frontend\models\Entity\LanguageEntity;

/**
 * Class LangRequest
 * @package frontend\components
 */
class LangRequest extends Request
{
    private $_lang_url;

    /**
     * Get url of language.
     *
     * @return null
     * @throws \Throwable
     */
    public function getLangUrl(): string
    {
        if ($this->_lang_url === null) {
            $this->prepareDefaultLang();
        }

        return $this->_lang_url;
    }

    /**
     * @throws \Throwable
     */
    public function prepareDefaultLang(): void
    {
        switch (true) {
            case $lang_url = $this->prepareLangByCookie():
            break;

            case $lang_url = $this->prepareLangByDB():
            break;

            default: $lang_url = $this->prepareLangByUrl();
        }

        if(
            null !== $lang_url
            && $lang_url === LanguageEntity::getCurrent()->url
            && 1 === strpos($this->_lang_url, LanguageEntity::getCurrent()->url)
        ) {
            $this->_lang_url = substr($this->_lang_url, \strlen(LanguageEntity::getCurrent()->url) + 1);
        }
    }

    /**
     * Resolve path info.
     *
     * @return string
     * @throws InvalidConfigException
     * @throws \Throwable
     */
    protected function resolvePathInfo(): string
    {
        $pathInfo = $this->getLangUrl();

        if (($pos = strpos($pathInfo, '?')) !== false) {
            $pathInfo = substr($pathInfo, 0, $pos);
        }

        $pathInfo = urldecode($pathInfo);

        // try to encode in UTF8 if not so
        // http://w3.org/International/questions/qa-forms-utf-8.html
        if (!preg_match('%^(?:
            [\x09\x0A\x0D\x20-\x7E]              # ASCII
            | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
            | \xE0[\xA0-\xBF][\x80-\xBF]         # excluding overlongs
            | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
            | \xED[\x80-\x9F][\x80-\xBF]         # excluding surrogates
            | \xF0[\x90-\xBF][\x80-\xBF]{2}      # planes 1-3
            | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
            | \xF4[\x80-\x8F][\x80-\xBF]{2}      # plane 16
            )*$%xs', $pathInfo)
        ) {
            $pathInfo = utf8_encode($pathInfo);
        }

        $scriptUrl = $this->getScriptUrl();
        $baseUrl = $this->getBaseUrl();
        if (strpos($pathInfo, $scriptUrl) === 0) {
            $pathInfo = substr($pathInfo, \strlen($scriptUrl));
        } elseif ($baseUrl === '' || strpos($pathInfo, $baseUrl) === 0) {
            $pathInfo = substr($pathInfo, \strlen($baseUrl));
        } elseif (isset($_SERVER['PHP_SELF']) && strpos($_SERVER['PHP_SELF'], $scriptUrl) === 0) {
            $pathInfo = substr($_SERVER['PHP_SELF'], \strlen($scriptUrl));
        } else {
            throw new InvalidConfigException('Unable to determine the path info of the current request.');
        }

        if (isset($pathInfo[0]) && strpos($pathInfo, '/') === 0) {
            $pathInfo = substr($pathInfo, 1);
        }

        return (string) $pathInfo;
    }

    /**
     * Prepare lang by url.
     *
     * @return null
     * @throws InvalidConfigException
     */
    private function prepareLangByUrl(): ?string
    {
        $this->_lang_url = $this->getUrl();
        $url_list = explode('/', $this->_lang_url);
        $lang_url = $url_list[1] ?? null;
        LanguageEntity::setCurrent($lang_url);

        $cookie = new Cookie([
            'name' => 'language',
            'value' => $lang_url,
        ]);
        \Yii::$app->response->cookies->add($cookie);

        return $lang_url;
    }

    /**
     * Prepare lang by cookie.
     *
     * @return null|string
     */
    private function prepareLangByCookie(): ?string
    {
        if ($language = \Yii::$app->request->cookies->getValue('language')) {
            return $language;
        }

        return null;
    }

    /**
     * Prepare lang by database.
     *
     * @return bool
     * @throws \Throwable
     */
    private function prepareLangByDB(): bool
    {
        if (!\Yii::$app->user->getIdentity()) {
            return false;
        }

        return \Yii::$app->user->getIdentity()->getLanguage();
    }
}