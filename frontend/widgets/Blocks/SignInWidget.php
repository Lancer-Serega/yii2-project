<?php

namespace frontend\widgets\Blocks;

use frontend\models\Form\SigninForm;
use frontend\widgets\BaseWidget;

/**
 * Class SignInWidget
 * @package frontend\widgets\Blocks
 */
class SignInWidget extends BaseWidget
{
    /**
     * @var string
     */
    public $formUrl;

    /**
     * @return string
     */
    public function run(): string
    {
        return $this->render('/signin-form', [
            'signinFormModel' => new SigninForm(),
            'formUrl' => $this->formUrl,
        ]);
    }
}
