<?php
namespace frontend\widgets\Blocks;

use frontend\models\Entity\Language;
use frontend\models\Form\UserChangeAccountForm;
use frontend\widgets\BaseWidget;

class UserChangeAccount extends BaseWidget
{
    public $formUrl;

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $langList = Language::prepareForDropdown(Language::find()->asArray()->all(), 'id', 'name');
        return $this->render('/user-change-account-form', [
            'userChangeAccountForm' => new UserChangeAccountForm(),
            'formUrl' => $this->formUrl,
            'langList' => $langList,
        ]);
    }
}
