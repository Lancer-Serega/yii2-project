<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 01.11.18
 * Time: 19:31
 */

namespace frontend\controllers;

use Yii;
use yii\web\ForbiddenHttpException;

/**
 * Cabinet controller
 */
class CabinetController extends BaseController
{
    /**
     * @inheritdoc
     * @param $action
     * @return bool
     */
    public function beforeAction($action)
    {
        $this->jsonData = [
            'status' => 'success',
            'errors' => [],
            'flash' => [],
            'data' => [],
        ];

        if (parent::beforeAction($action)) {
            if (!\Yii::$app->user->can('user')) {
                throw new ForbiddenHttpException(Yii::t('error', 'Access denied'));
            }
            return true;
        }

        return false;
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'response' => __METHOD__,
        ]);
    }

    public function actionAccount()
    {
        return $this->render('account', [
            'response' => __METHOD__,
        ]);
    }

    public function actionActiveTariffs()
    {
        return $this->render('active-tariffs', [
            'response' => __METHOD__,
        ]);
    }

    public function actionTariffs()
    {
        return $this->render('tariffs', [
            'response' => __METHOD__,
        ]);
    }

    public function actionTrialPeriod()
    {
        return $this->render('trial-period', [
            'response' => __METHOD__,
        ]);
    }

    public function actionSupport()
    {
        return $this->render('support', [
            'response' => __METHOD__,
        ]);
    }

    public function actionFaq()
    {
        return $this->render('faq', [
            'response' => __METHOD__,
        ]);
    }

    public function actionSettings()
    {
        return $this->render('settings', [
            'response' => __METHOD__,
        ]);
    }

    public function actionSecurity()
    {
        return $this->render('security', [
            'response' => __METHOD__,
        ]);
    }

    public function actionFinanceOperations()
    {
        return $this->render('finance-operations', [
            'response' => __METHOD__,
        ]);
    }
}