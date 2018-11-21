<?php
namespace frontend\widgets\Blocks;

use frontend\models\Form\LoginForm;
use frontend\widgets\BaseWidget;

class LogInWidget extends BaseWidget
{
    public $formUrl;

    /**
     * {@inheritdoc}
     */
    public function run(): string
    {
        $loginForm = new LoginForm();
        if (array_key_exists('LoginForm', $_REQUEST)) {
            $loginForm->email = $_REQUEST['LoginForm']['email'];
            $loginForm->remember = $_REQUEST['LoginForm']['remember'];
        }

        return $this->render('/login-form', [
            'loginFormModel' => $loginForm,
            'formUrl' => $this->formUrl,
        ]);
    }
}
