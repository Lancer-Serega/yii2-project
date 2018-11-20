<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 01.11.18
 * Time: 19:31
 */

namespace frontend\controllers;

use frontend\models\Entity\LogUserAuthEntity;
use frontend\models\Form\UserChangeAccountForm;
use frontend\models\Repository\UserConfigRepository;
use frontend\services\IdentityService;
use Yii;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * Cabinet controller.
 *
 * Class CabinetController
 * @package frontend\controllers
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
                    'security' => ['GET'],
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

    /**
     * @return string
     */
    public function actionIndex(): string
    {
        return $this->render('index', [
            'response' => __METHOD__,
        ]);
    }

    /**
     * Action render account.
     *
     * @return string
     */
    public function actionAccount(): string
    {
        return $this->render('account', [
            'response' => __METHOD__,
        ]);
    }

    /**
     * Action render active tariffs
     *
     * @return string
     */
    public function actionActiveTariffs(): string
    {
        return $this->render('active-tariffs', [
            'response' => __METHOD__,
        ]);
    }

    /**
     * Action render tariffs.
     *
     * @return string
     */
    public function actionTariffs(): string
    {
        return $this->render('tariffs');
    }

    /**
     * Action render trial period.
     *
     * @return string
     */
    public function actionTrialPeriod(): string
    {
        return $this->render('trial-period', [
            'response' => __METHOD__,
        ]);
    }

    /**
     * Action render support.
     *
     * @return string
     */
    public function actionSupport(): string
    {
        return $this->render('support', [
            'response' => __METHOD__,
        ]);
    }

    /**
     * Action render FAQ.
     * @return string
     */
    public function actionFaq(): string
    {
        return $this->render('faq', [
            'response' => __METHOD__,
        ]);
    }

    /**
     * Action render settings.
     *
     * @return string
     */
    public function actionSettings(): string
    {
        return $this->render('settings');
    }

    /**
     * Action render security.
     *
     * @return string
     * @throws \Throwable
     */
    public function actionSecurity(): string
    {
        $user = \Yii::$app->getUser()->getIdentity();
        $userConfig['two_factor_auth'] = UserConfigRepository::getTwoFactorAuth(['two_factor_auth'], (int)$user->getId());
        $userAuthHistoryList = LogUserAuthEntity::findAll(['user_id' => \Yii::$app->user->getIdentity()->id]);

        return $this->render('security', [
            'userConfig' => $userConfig,
            'userAuthHistoryList' => $userAuthHistoryList,
        ]);
    }

    /**
     * Action saving settings.
     *
     * @return string
     * @throws \Throwable
     */
    public function actionSettingsSave(): string
    {
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
                } else {
                    $this->jsonData['flash']['error'][] = Yii::t('form', 'Information was not saved due to server error.');
                }
            } catch (\Exception $e) {
                Yii::$app->errorHandler->logException($e);
                $this->responseStatus = self::RESPONSE_STATUS_ERROR;
                $this->jsonData['flash']['error'][] = Yii::t('form', 'Information was not saved due to server error.');
                if (\Yii::$app->getRequest()->isAjax) {
                    return $this->asJson($this->jsonData);
                }

                return $this->render('@app/views/themes/admin-pro/cabinet/settings');
            }
        }

        if (\Yii::$app->getRequest()->isAjax) {
            return $this->asJson($this->jsonData);
        }

        return $this->render('@app/views/themes/admin-pro/cabinet/settings');
    }

    /**
     * Action render finance operations.
     *
     * @return string
     */
    public function actionFinanceOperations(): string
    {
        return $this->render('finance-operations');
    }
}