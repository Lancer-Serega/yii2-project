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
        $signinForm = new SigninForm();
        if (array_key_exists('SigninForm', $_REQUEST)) {
            $signinForm->username = $_REQUEST['SigninForm']['username'];
            $signinForm->email = $_REQUEST['SigninForm']['email'];
        }

        return $this->render('/signin-form', [
            'signinFormModel' => new SigninForm(),
            'formUrl' => $this->formUrl,
        ]);
    }
}
