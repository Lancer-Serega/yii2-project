<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 01.11.18
 * Time: 19:31
 */

namespace frontend\controllers;

use frontend\models\UserChangeAccountFormModel;
use frontend\services\IdentityService;
use Yii;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

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
            if (!\Yii::$app->user->can('cabinet.view')) {
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
        return $this->render('tariffs');
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
        return $this->render('settings');
    }

    public function actionSettingsSave()
    {
        if (!Yii::$app->getRequest()->isAjax) {
            Yii::$app->getResponse()->setStatusCode(404);
            Yii::$app->getResponse()->send();
        }

        Yii::$app->response->format = Response::FORMAT_JSON;

        $flashList = [];
        $errorList = [];
        $form = new UserChangeAccountFormModel();
        $service = new IdentityService();
        if ($form->load(Yii::$app->request->post(), 'UserChangeAccountFormModel')) {
            try {
                $user = $service->userChangeAccount($form);
                if ($user) {
                    $service->sendEmailConfirm($user);
                    $auth = Yii::$app->authManager;
                    $auth->assign($auth->getRole('user'), $user->id);
                    $this->responseStatus = self::RESPONSE_STATUS_SUCCESS;
                    $this->jsonData['data'] = [
                        'user_id' => $user->id,
                        'user_email' => $user->email,
                    ];
                    Yii::$app->session->setFlash('warning', Yii::t('form', 'To complete the registration, confirm your email. Check your email.'));
                }
            } catch (\Exception $e) {
                Yii::$app->errorHandler->logException($e);
                $this->responseStatus = self::RESPONSE_STATUS_ERROR;
                $errorList[] = $e->getMessage();
                $flashList = ['error' => $e->getMessage()];
            }
        }

        $data = array_merge_recursive($this->jsonData, [
            'status' => $this->responseStatus,
            'errors' => $errorList,
            'flash' => $flashList,
        ]);

        return $data;
    }

    public function actionSecurity()
    {
        return $this->render('security');
    }

    public function actionFinanceOperations()
    {
        return $this->render('finance-operations');
    }
}