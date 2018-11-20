<?php

namespace frontend\widgets\Blocks;

use frontend\widgets\BaseWidget;

/**
 * Class NotificationWidget
 * @package frontend\widgets\Blocks
 */
class NotificationWidget extends BaseWidget
{
    /**
     * {@inheritdoc}
     */
    public function run(): string
    {
        return $this->render('/notification', []);
    }
}
