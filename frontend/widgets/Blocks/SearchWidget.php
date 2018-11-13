<?php
namespace frontend\widgets\Blocks;

use frontend\models\SearchForm;
use frontend\widgets\BaseWidget;

class SearchWidget extends BaseWidget
{
    /**
     * @var string 
     */
    public $search;
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('/search', [
            'model' => new SearchForm(),
            'search' => $this->search,
        ]);
    }
}
