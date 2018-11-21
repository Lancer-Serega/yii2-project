<?php

namespace frontend\controllers;

use frontend\models\Repository\NotificationUserRepository;
use frontend\models\Repository\UserConfigRepository;
use yii\web\Response;

/**
 * UserSettings controller
 *
 * Class UserSettingsController
 * @package frontend\controllers
 */
class UserSettingsController extends BaseController
{
    /**
     * Change user security two factor auth option
     *
     * @return mixed
     * @throws \Throwable
     */
    public function actionChangeNotification(): Response
    {
        $user = \Yii::$app->getUser()->getIdentity();
        if (!$user) {
            $msg = \Yii::t('error', 'An error occurred while trying to identify the user!');
            throw new \RuntimeException($msg);
        }

        $notificationName = \Yii::$app->getRequest()->post('name');
        $notificationValue = (bool)\Yii::$app->getRequest()->post('value');

        $this->jsonData['status'] = NotificationUserRepository::changeNotification((int)$user->getId(), $notificationName, $notificationValue)
            ? self::RESPONSE_STATUS_SUCCESS
            : self::RESPONSE_STATUS_ERROR;

        return $this->asJson($this->jsonData);
    }
}
