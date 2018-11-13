<?php
namespace frontend\widgets\Blocks;

use frontend\models\Lang;
use frontend\models\UserChangeAccountForm;
use frontend\widgets\BaseWidget;

class UserChangeAccount extends BaseWidget
{
    public $formUrl;

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $langList = Lang::prepareForDropdown(Lang::find()->asArray()->all(), 'id', 'name');
        return $this->render('/user-change-account-form', [
            'userChangeAccountForm' => new UserChangeAccountForm(),
            'formUrl' => $this->formUrl,
            'langList' => $langList,
        ]);
    }
}
