<?php
namespace frontend\controllers;

use frontend\models\Entity\Language;
use frontend\models\Entity\User;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

/**
 * Base controller
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
    public function beforeAction($action)
    {
        if (\Yii::$app->request->isAjax) {
            $this->initJsonData();
        }

        $this->initLanguage();

        return $this->initAccess($action);
    }

    private function initLanguage(): void
    {
        /**
         * @var User $user
         */
        if ($user = \Yii::$app->user->identity) {
            $userConfig = $user->getUserConfig($user->user_config_id);
            $language = $userConfig->getLanguage($userConfig->language_id);
            $language = $language->url;
        } elseif (\Yii::$app->request->cookies->getValue('language')) {
            $language = \Yii::$app->request->cookies->getValue('language');
        } else {
            $language = Language::getDefaultLang()->url;
        }
        Language::setCurrent($language);
    }

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
     * @throws ForbiddenHttpException
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
