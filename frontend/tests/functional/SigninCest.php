<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use frontend\models\User;

class SigninCest
{
    protected $formId = '#signin-form';


    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('index/signin-form');
    }

    public function signinWithEmptyFields(FunctionalTester $I)
    {
        $I->see('Signin', 'h1');
        $I->see('Please fill out the following fields to signin-form:');
        $I->submitForm($this->formId, []);
        $I->seeValidationError('Username cannot be blank.');
        $I->seeValidationError('Email cannot be blank.');
        $I->seeValidationError('Password cannot be blank.');

    }

    public function signinWithWrongEmail(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
            'SigninForm[username]'  => 'tester',
            'SigninForm[email]'     => 'ttttt',
            'SigninForm[password]'  => 'tester_password',
        ]
        );
        $I->dontSee('Username cannot be blank.', '.help-block');
        $I->dontSee('Password cannot be blank.', '.help-block');
        $I->see('Email is not a valid email address.', '.help-block');
    }

    public function signinSuccessfully(FunctionalTester $I)
    {
        $I->submitForm($this->formId, [
            'SigninForm[username]' => 'tester',
            'SigninForm[email]' => 'tester.email@example.com',
            'SigninForm[password]' => 'tester_password',
        ]);

        $I->seeRecord(User::class, [
            'username' => 'tester',
            'email' => 'tester.email@example.com',
        ]);

        $I->see('Logout (tester)', 'form button[type=submit]');
    }
}
