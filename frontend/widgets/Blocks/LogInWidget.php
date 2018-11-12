<?php
namespace frontend\widgets\Blocks;

use frontend\models\LoginForm;
use frontend\widgets\BaseWidget;

class LogInWidget extends BaseWidget
{
    public $formUrl;

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('/login-form', [
            'loginFormModel' => new LoginForm(),
            'formUrl' => $this->formUrl,
        ]);
    }
}
