<?php

namespace frontend\widgets\Blocks;

use frontend\widgets\BaseWidget;

/**
 * Class ProfileWidget
 * @package frontend\widgets\Blocks
 */
class ProfileWidget extends BaseWidget
{
    /**
     * @return string
     */
    public function run(): string
    {
        return $this->render('/profile');
    }
}
