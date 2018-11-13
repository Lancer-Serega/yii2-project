<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 01.11.18
 * Time: 19:31
 */

namespace frontend\controllers;

use frontend\models\UserChangeAccountForm;
use frontend\services\IdentityService;
use Yii;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

/**
 * Cabinet controller
 */
class CabinetController extends BaseController
{
    /**
     * @return array
     */
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'settings' => ['GET'],
                    'settings-save' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     * @param $action
     * @return bool
     */
    public function beforeAction($action): bool
    {
        $this->jsonData = [
            'status' => 'success',
            'errors' => [],
            'flash' => [],
            'data' => [],
        ];

        if (parent::beforeAction($action)) {
            if (!\Yii::$app->user->can('cabinet.view')) {
                throw new ForbiddenHttpException(Yii::t('error', 'Access denied'));
            }
            return true;
        }

        return false;
    }

    public function actionIndex(): string
    {
        return $this->render('index', [
            'response' => __METHOD__,
        ]);
    }

    public function actionAccount(): string
    {
        return $this->render('account', [
            'response' => __METHOD__,
        ]);
    }

    public function actionActiveTariffs(): string
    {
        return $this->render('active-tariffs', [
            'response' => __METHOD__,
        ]);
    }

    public function actionTariffs(): string
    {
        return $this->render('tariffs');
    }

    public function actionTrialPeriod(): string
    {
        return $this->render('trial-period', [
            'response' => __METHOD__,
        ]);
    }

    public function actionSupport(): string
    {
        return $this->render('support', [
            'response' => __METHOD__,
        ]);
    }

    public function actionFaq(): string
    {
        return $this->render('faq', [
            'response' => __METHOD__,
        ]);
    }

    public function actionSettings(): string
    {
        return $this->render('settings');
    }

    /**
     * @return array
     * @throws \Throwable
     */
    public function actionSettingsSave(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $form = new UserChangeAccountForm();
        $service = new IdentityService();
        if ($form->load(Yii::$app->request->post(), 'UserChangeAccountForm')) {
            try {
                $user = $service->userChangeAccount($form);
                if ($user) {
                    $this->responseStatus = self::RESPONSE_STATUS_SUCCESS;
                    $this->jsonData['data'] = [
                        'user_id' => $user->id,
                        'user_email' => $user->email,
                    ];
                    $this->jsonData['flash']['success'][] = Yii::t('form', 'Information saved successfully');
                }
                $this->jsonData['flash']['error'][] = Yii::t('form', 'Information was not saved due to server error.');
            } catch (\Exception $e) {
                Yii::$app->errorHandler->logException($e);
                $this->responseStatus = self::RESPONSE_STATUS_ERROR;
                $this->jsonData['flash']['error'][] = Yii::t('form', 'Information was not saved due to server error.');
            }
        }

        return $this->jsonData;
    }

    public function actionSecurity(): string
    {
        return $this->render('security');
    }

    public function actionFinanceOperations(): string
    {
        return $this->render('finance-operations');
    }
}