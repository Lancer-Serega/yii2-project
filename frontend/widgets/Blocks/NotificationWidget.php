<?php
namespace frontend\widgets\Blocks;

use frontend\widgets\BaseWidget;

class NotificationWidget extends BaseWidget
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('/notification', []);
    }
}
