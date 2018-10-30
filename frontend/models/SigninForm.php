<?php
namespace frontend\models;

use yii\base\Exception;
use yii\base\Model;

/**
 * Signin form
 */
class SigninForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $role = 1;
    public $login;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $msgEmail = \Yii::t('app', 'This email address has already been taken.');
        $msgPass = \Yii::t('app', 'Passwords don\'t match');

        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => User::class, 'message' => $msgEmail],

            ['password', 'required'],
            ['password', 'string', 'min' => 8],

            ['password_repeat', 'required'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => $msgPass],
        ];
    }

    /**
     * Signs user up.
     * @return User|null the saved model or null if saving fails
     * @throws Exception
     */
    public function signin()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->role = $this->role;
        $user->email = $this->email;
        $user->login = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
