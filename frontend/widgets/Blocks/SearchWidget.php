<?php

namespace frontend\widgets\Blocks;

use frontend\models\Form\SearchForm;
use frontend\widgets\BaseWidget;

/**
 * Class SearchWidget
 * @package frontend\widgets\Blocks
 */
class SearchWidget extends BaseWidget
{
    /**
     * @var string 
     */
    public $search;

    /**
     * @return string
     */
    public function run(): string
    {
        return $this->render('/search', [
            'model' => new SearchForm(),
            'search' => $this->search,
        ]);
    }
}
