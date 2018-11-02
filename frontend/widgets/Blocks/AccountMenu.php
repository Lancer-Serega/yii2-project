<?php
namespace frontend\widgets\Blocks;

use frontend\models\User;
use yii\bootstrap\Widget;

class AccountMenu extends Widget
{
    /**
     * @var User
     */
    public $user;

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('account/view', [
            'user' => $this->user,
        ]);
    }
}
