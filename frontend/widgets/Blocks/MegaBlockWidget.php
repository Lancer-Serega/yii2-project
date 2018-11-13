<?php
namespace frontend\widgets\Blocks;

use frontend\widgets\BaseWidget;

class MegaBlockWidget extends BaseWidget
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('/mega-block', []);
    }
}
