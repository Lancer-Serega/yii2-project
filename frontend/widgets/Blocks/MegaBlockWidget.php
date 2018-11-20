<?php

namespace frontend\widgets\Blocks;

use frontend\widgets\BaseWidget;

/**
 * Class MegaBlockWidget
 * @package frontend\widgets\Blocks
 */
class MegaBlockWidget extends BaseWidget
{
    /**
     * {@inheritdoc}
     */
    public function run(): string
    {
        return $this->render('/mega-block', []);
    }
}
