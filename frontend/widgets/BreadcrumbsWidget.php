<?php

namespace frontend\widgets;

use \yii\widgets\Breadcrumbs;

class BreadcrumbsWidget extends Breadcrumbs
{
    public function run()
    {
        $liTemplate = "<li class=\"breadcrumb-item\"><i>{link}</i></li>\n";
        $this->activeItemTemplate = $this->itemTemplate = $liTemplate;

        parent::run();
    }
}
