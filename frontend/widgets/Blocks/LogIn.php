<?php
namespace frontend\widgets\Blocks;

use frontend\models\LoginForm;
use yii\bootstrap\Widget;

class LogIn extends Widget
{
    public $formUrl;

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('login-form', [
            'loginFormModel' => new LoginForm(),
            'formUrl' => $this->formUrl,
        ]);
    }
}
