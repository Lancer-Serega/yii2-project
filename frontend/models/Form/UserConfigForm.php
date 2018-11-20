<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 19.11.18
 * Time: 18:59
 */

namespace frontend\models\Form;

/**
 * Class UserConfigForm
 * @package frontend\models\Form
 */
class UserConfigForm extends BaseForm
{
    /**
     * @var int
     */
    public $languageId;

    /**
     * @var string
     */
    public $twoFactorAuthKey;

    /**
     * @return array the validation rules.
     */
    public function rules(): array
    {
        $msg = [
            'twoFactorAuthKey' => [
                'max' => \Yii::t('form', 'The "{field_name}" value must contain a maximum of {max} characters.', ['field_name' => \Yii::t('form', 'Two factor key')]),
            ]
        ];

        return [
            ['twoFactorAuthKey', 'trim'],
            ['twoFactorAuthKey', 'required'],
            ['twoFactorAuthKey', 'string', 'max' => 32, 'tooLong' => $msg['twoFactorAuthKey']['max']],
        ];
    }
}