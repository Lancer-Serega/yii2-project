<?php

namespace frontend\controllers;

use frontend\models\Repository\UserConfigRepository;

/**
 * UserSecurity controller
 */
class UserSecurityController extends BaseController
{
    /**
     * Change user security two factor auth option
     *
     * @return mixed
     * @throws \Throwable
     */
    public function actionChangeTwoFactorAuth()
    {
        $userId = (int)\Yii::$app->getUser()->getIdentity()->getId();
        $twoFactorAuth = (bool)\Yii::$app->getRequest()->post('twoFactorAuth');

        $this->jsonData['status'] = UserConfigRepository::setTwoFactorAuth($userId, $twoFactorAuth)
            ? self::RESPONSE_STATUS_SUCCESS
            : self::RESPONSE_STATUS_ERROR;

        return $this->asJson($this->jsonData);
    }
}
