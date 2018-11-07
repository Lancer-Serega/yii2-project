<?php
namespace frontend\widgets\Blocks;

use frontend\models\Lang;
use frontend\models\UserChangeAccountFormModel;
use yii\bootstrap\Widget;

class UserChangeAccount extends Widget
{
    public $formUrl;

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $langList = Lang::prepareForDropdown(Lang::find()->asArray()->all(), 'id', 'name');
        return $this->render('user-change-account-form', [
            'userChangeAccountFormModel' => new UserChangeAccountFormModel(),
            'formUrl' => $this->formUrl,
            'langList' => $langList,
        ]);
    }
}
