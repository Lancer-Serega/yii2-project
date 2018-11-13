<?php
namespace frontend\widgets\Blocks;

use frontend\widgets\BaseWidget;

class ProfileWidget extends BaseWidget
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('/profile', []);
    }
}
