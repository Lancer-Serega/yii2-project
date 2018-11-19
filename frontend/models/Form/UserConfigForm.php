<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 19.11.18
 * Time: 18:59
 */

namespace frontend\models\Form;


class UserConfigForm extends BaseForm
{
    /**
     * @var int
     */
    public $languageId;

    /**
     * @var string
     */
    public $twoFactorAuth;

    /**
     * @var string
     */
    public $twoFactorAuthKey;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        $msg = [
            'twoFactorAuth' => [
                'max' => \Yii::t('form', 'The "{field_name}" value must contain a maximum of {max} characters.', ['field_name' => \Yii::t('form', 'Two factor key')]),
            ]
        ];

        return [
            ['twoFactorAuth', 'trim'],
            ['twoFactorAuth', 'required'],
            ['twoFactorAuth', 'string', 'max' => 32, 'tooLong' => $msg['twoFactorAuth']['max']],
        ];
    }
}