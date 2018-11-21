<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 21.11.18
 * Time: 16:11
 */

namespace frontend\services;

use frontend\models\Entity\LogUserAuthEntity;
use frontend\models\Repository\UserConfigRepository;

/**
 * Class CabinetService
 * @package frontend\services
 */
class CabinetService extends BaseService
{
    /**
     * Get data for CabinetController::actionSecurity
     * @return array
     * @throws \Throwable
     */
    public function userSecurity(): array
    {
        $user = \Yii::$app->getUser()->getIdentity();
        if (!$user) {
            throw new \RuntimeException(\Yii::t('error', 'An error occurred while trying to identify the user!'));
        }

        $twoFactorAuth = UserConfigRepository::getTwoFactorAuth(['two_factor_auth'], (int)$user->getId());
        $userAuthHistoryList = LogUserAuthEntity::findAll(['user_id' => (int)$user->getId()]);

        return [
            'twoFactorAuth' => $twoFactorAuth,
            'userAuthHistoryList' => $userAuthHistoryList ?? [],
        ];
    }
}