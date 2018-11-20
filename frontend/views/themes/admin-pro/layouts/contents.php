<?php
/**
 * Created by PhpStorm.
 * UserEntity: sergey
 * Date: 12.11.18
 * Time: 15:19
 */
use \frontend\widgets\Blocks\LogInWidget;
use \frontend\widgets\Blocks\SignInWidget;
use \yii\helpers\Url;
?>

<!-- ============================================================== -->
<!-- Contents :: Start  -->
<!-- ============================================================== -->
<?php try {
    echo LogInWidget::widget(['formUrl' => Url::to(['/login'])]);
} catch (\Exception $e) {
    echo 'Error loaded widget login!';
} ?>

<?php try {
    echo SignInWidget::widget(['formUrl' => Url::to(['/signin'])]);
} catch (\Exception $e) {
    echo 'Error loaded widget signin!';
} ?>
<!-- ============================================================== -->
<!-- Contents :: END  -->
<!-- ============================================================== -->
