<?php
namespace frontend\widgets\Blocks;

use frontend\widgets\BaseWidget;

class MessageWidget extends BaseWidget
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('/message', []);
    }
}
