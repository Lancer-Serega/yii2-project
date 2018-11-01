<?php
namespace frontend\controllers;

use frontend\models\User;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

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
    protected $jsonData;

    /**
     * @var string One of list $self::RESPONSE_STATUS_*
     */
    protected $responseStatus;

    /**
     * @inheritdoc
     * @param $action
     * @return bool
     * @throws BadRequestHttpException
     */
    public function beforeAction($action)
    {
        $this->jsonData = [
            'status' => 'success',
            'errors' => [],
            'flash' => [],
            'data' => [],
        ];

        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->getIdentity()->email_status === User::EMAIL_NOT_CONFIRMED) {
                $this->response;
            }
        }

        if (parent::beforeAction($action)) {
//            if (!\Yii::$app->user->can($action->id)) {
//                throw new ForbiddenHttpException(Yii::t('error', 'Access denied'));
//            }
            return true;
        }

        return false;
    }

    /**
     * @param mixed $data
     * @return void|Response
     */
    public function asJson($data)
    {
        parent::asJson($data);
    }
}
