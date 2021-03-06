<?php

namespace frontend\controllers;

use frontend\models\Repository\UserConfigRepository;
use yii\web\Response;

/**
 * UserSecurity controller
 *
 * Class UserSecurityController
 * @package frontend\controllers
 */
class UserSecurityController extends BaseController
{
    /**
     * Change user security two factor auth option
     *
     * @return mixed
     * @throws \Throwable
     */
    public function actionChangeTwoFactorAuth(): Response
    {
        $user = \Yii::$app->getUser()->getIdentity();
        if (!$user) {
            $msg = \Yii::t('error', 'An error occurred while trying to identify the user!');
            throw new \RuntimeException($msg);
        }

        $settingValue = (bool)\Yii::$app->getRequest()->post('value');

        $this->jsonData['status'] = UserConfigRepository::changeTwoFactorAuth($user->getId(), $settingValue)
            ? self::RESPONSE_STATUS_SUCCESS
            : self::RESPONSE_STATUS_ERROR;

        return $this->asJson($this->jsonData);
    }
}
