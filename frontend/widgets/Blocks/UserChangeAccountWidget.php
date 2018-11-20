<?php

namespace frontend\widgets\Blocks;

use frontend\models\Entity\LanguageEntity;
use frontend\models\Form\UserChangeAccountForm;
use frontend\widgets\BaseWidget;

/**
 * Class UserChangeAccountWidget
 * @package frontend\widgets\Blocks
 */
class UserChangeAccountWidget extends BaseWidget
{
    /**
     * @var string
     */
    public $formUrl;

    /**
     * @return string
     */
    public function run(): string
    {
        $langList = LanguageEntity::prepareForDropdown(LanguageEntity::find()->asArray()->all(), 'id', 'name');

        return $this->render('/user-change-account-form', [
            'userChangeAccountForm' => new UserChangeAccountForm(),
            'formUrl' => $this->formUrl,
            'langList' => $langList,
        ]);
    }
}
