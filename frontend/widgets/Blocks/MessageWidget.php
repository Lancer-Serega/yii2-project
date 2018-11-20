<?php

namespace frontend\widgets\Blocks;

use frontend\widgets\BaseWidget;

/**
 * Class MessageWidget
 * @package frontend\widgets\Blocks
 */
class MessageWidget extends BaseWidget
{
    /**
     * {@inheritdoc}
     */
    public function run(): string
    {
        return $this->render('/message', []);
    }
}
