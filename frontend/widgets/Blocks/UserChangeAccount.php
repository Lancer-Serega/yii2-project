<?php
namespace frontend\widgets\Blocks;

use frontend\models\Lang;
use frontend\models\UserChangeAccountForm;
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
            'userChangeAccountForm' => new UserChangeAccountForm(),
            'formUrl' => $this->formUrl,
            'langList' => $langList,
        ]);
    }
}
