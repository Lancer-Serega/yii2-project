<?php
namespace frontend\widgets\Blocks;

use frontend\models\Entity\UserEntity;
use yii\bootstrap\Widget;

class AccountMenuWidget extends Widget
{
    /**
     * @var UserEntity
     */
    public $user;

    /**
     * {@inheritdoc}
     */
    public function run(): string
    {
        return $this->render('account/view', [
            'user' => $this->user,
        ]);
    }
}
