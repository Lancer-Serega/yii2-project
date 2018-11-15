<?php

namespace frontend\widgets\Blocks;

use frontend\models\Form\SigninForm;
use frontend\widgets\BaseWidget;

class SignInWidget extends BaseWidget
{
    public $formUrl;
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('/signin-form', [
            'signinFormModel' => new SigninForm(),
            'formUrl' => $this->formUrl,
        ]);
    }
}
