<?php

namespace frontend\widgets\Blocks;

use frontend\models\SigninForm;
use yii\bootstrap\Widget;

class SignIn extends Widget
{
    public $formUrl;
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('signin-form', [
            'signinFormModel' => new SigninForm(),
            'formUrl' => $this->formUrl,
        ]);
    }
}
