<?php

use yii\mail\MessageInterface;
use yii\web\View;

/**
 * @var View             $this    View component instance
 * @var MessageInterface $message The message being composed
 * @var string           $content Main view render result
 */
?>

<?php $this->beginPage(); ?>
    <?php $this->beginBody(); ?>
        <?= $content; ?>
    <?php $this->endBody(); ?>
<?php $this->endPage(); ?>
