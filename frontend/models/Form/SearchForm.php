<?php

namespace frontend\models\Form;

use Yii;
use yii\db\ActiveRecord;

class SearchForm extends ActiveRecord
{
    public static $search;

    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $msg = [
            'required' => Yii::t('form', 'This field is required'),
            'search' => [
                'min' => Yii::t('form', 'The "Password" value must contain at least {min} characters.'),
                'max' => Yii::t('form', 'The "Email" value must contain a maximum of {max} characters.'),
            ],
        ];

        return [
            [['search'], 'trim'],
            ['search', 'string', 'min' => 2, 'max' => 255, 'tooShort' => $msg['search']['min'], 'tooLong' => $msg['search']['max']],
        ];
    }
}
