<?php
namespace frontend\widgets\Blocks;

use frontend\models\Entity\UserEntity;
use frontend\widgets\BaseWidget;

class AccountMenuWidget extends BaseWidget
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
        return $this->render('/account/view', [
            'user' => $this->user,
        ]);
    }
}
