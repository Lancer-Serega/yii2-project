<?php
namespace frontend\models\Form;

use frontend\models\Entity\UserEntity;
use yii\base\Exception;
use yii\base\InvalidArgumentException;

/**
 * Password reset form.
 *
 * Class ResetPasswordForm
 * @package frontend\models\Form
 */
class ResetPasswordForm extends BaseForm
{
    /**
     * @var string
     */
    public $password;

    /**
     * @var UserEntity
     */
    private $_user;

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws InvalidArgumentException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !\is_string($token)) {
            throw new InvalidArgumentException(\Yii::t('error', 'Password reset token cannot be blank.'));
        }
        $this->_user = UserEntity::findByPasswordResetToken($token);
        if (!$this->_user) {
            throw new InvalidArgumentException(\Yii::t('error', 'Wrong password reset token.'));
        }
        parent::__construct($config);
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     * @throws Exception
     */
    public function resetPassword(): bool
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();

        return $user->save(false);
    }
}
