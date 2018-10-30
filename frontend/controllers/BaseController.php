<?php
namespace frontend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

/**
 * Base controller
 */
class BaseController extends Controller
{
    /**
     * @inheritdoc
     * @throws ForbiddenHttpException
     * @throws BadRequestHttpException
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (!\Yii::$app->user->can($action->id)) {
                throw new ForbiddenHttpException(Yii::t('error', 'Access denied'));
            }
            return true;
        }

        return false;
    }
}
