<?php

namespace frontend\widgets\Blocks;

use frontend\models\Entity\LanguageEntity;
use frontend\models\Entity\NotificationEntity;
use frontend\models\Entity\NotificationUserEntity;
use frontend\models\Form\UserChangeAccountForm;
use frontend\models\Repository\NotificationRepository;
use frontend\models\Repository\NotificationUserRepository;
use frontend\widgets\BaseWidget;

/**
 * Class UserChangeAccountWidget
 * @package frontend\widgets\Blocks
 */
class UserChangeAccountWidget extends BaseWidget
{
    /**
     * @var string
     */
    public $formUrl;

    /**
     * @return string
     * @throws \Throwable
     */
    public function run(): string
    {
        $user = \Yii::$app->user->getIdentity();
        if (!$user) {
            $msg = \Yii::t('error', 'An error occurred while trying to identify the user!');
            throw new \RuntimeException($msg);
        }

        $langList = LanguageEntity::find()->asArray()->all();
        $langList = LanguageEntity::prepareForDropdown($langList, 'id', 'name');

        $notificationList = NotificationRepository::getAll(
            NotificationEntity::tableName(),
            ['id', 'name', 'description']
        );

        $notificationUserList = NotificationUserRepository::getAll(
            NotificationUserEntity::tableName(),
            ['user_id', 'notification_id', 'value'],
            ['user_id' => $user->getId()]
        );
        foreach ($notificationUserList as &$notificationUser) {
            foreach ($notificationList as $notification) {
                if ($notificationUser['notification_id'] === $notification['id']) {
                    $notificationUser['notification_name'] = $notification['name'];
                    break;
                }
            }
        }

        return $this->render('/user-change-account-form', [
            'userChangeAccountForm' => new UserChangeAccountForm(),
            'formUrl' => $this->formUrl,
            'langList' => $langList,
            'notificationList' => $notificationList,
            'notificationUserList' => $notificationUserList,
        ]);
    }
}
