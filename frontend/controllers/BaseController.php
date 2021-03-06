<?php

namespace frontend\controllers;

use frontend\models\Entity\LanguageEntity;
use frontend\models\Entity\UserEntity;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * Base controller.
 *
 * Class BaseController
 * @package frontend\controllers
 */
class BaseController extends Controller
{
    public const RESPONSE_STATUS_SUCCESS = 'success';
    public const RESPONSE_STATUS_ERROR = 'error';

    /**
     * @var array
     */
    public $jsonData;

    /**
     * @var string One of list $self::RESPONSE_STATUS_*
     */
    protected $responseStatus;

    /**
     * @inheritdoc
     * @param $action
     * @return bool
     * @throws \Throwable
     */
    public function beforeAction($action): bool
    {
        if (\Yii::$app->request->isAjax) {
            $this->initJsonData();
        }

        $this->initLanguage();

        return $this->initAccess($action);
    }

    public function init(): void
    {
        $theme = \Yii::$app->user->isGuest ? 'basic' : 'admin-pro';

        \Yii::$app->layout = "@app/views/themes/$theme/layouts/main";
        \Yii::$app->view->theme->basePath = "@app/views/themes/$theme";
        \Yii::$app->view->theme->baseUrl = "@web/themes/$theme";
        \Yii::$app->view->theme->pathMap = [
            '@app/views' => [
                "@app/views/themes/$theme",
            ],
            '@app/widgets' => "@app/views/themes/$theme/widget",
        ];

        parent::init();
    }

    /**
     * Initialization language
     */
    private function initLanguage(): void
    {
        /**
         * @var UserEntity $user
         */
        if ($user = \Yii::$app->user->identity) {
            $userConfig = $user->getUserConfig($user->user_config_id);
            $language = $userConfig->getLanguage($userConfig->language_id);
            $language = $language->url;
        } elseif (\Yii::$app->request->cookies->getValue('language')) {
            $language = \Yii::$app->request->cookies->getValue('language');
        } else {
            $language = LanguageEntity::getDefaultLang()->url;
        }
        LanguageEntity::setCurrent($language);
    }

    /**
     * Init JSON template for response (only ajax)
     */
    private function initJsonData(): void
    {
        $this->jsonData = [
            'status' => 'success',
            'errors' => [],
            'flash' => [],
            'data' => [],
            'redirect' => '',
        ];
    }

    /**
     * @param $action
     * @return bool
     * @throws BadRequestHttpException
     */
    private function initAccess($action): bool
    {
        if (parent::beforeAction($action)) {
//            if (!\Yii::$app->user->can($action->id)) {
//                throw new ForbiddenHttpException(Yii::t('error', 'Access denied'));
//            }
            return true;
        }

        return false;
    }
}
