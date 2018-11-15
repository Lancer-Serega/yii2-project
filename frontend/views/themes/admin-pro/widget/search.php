<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 13.11.18
 * Time: 14:21
 */

use \frontend\models\Form\SearchForm;
use \yii\helpers\Html;
use \yii\widgets\ActiveForm;

/**
 * @var string $search
 * @var SearchForm $model
 */
?>

<!-- ============================================================== -->
<!-- Search -->
<!-- ============================================================== -->
<a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)">
    <i class="ti-search"></i>
</a>
<?php $form = ActiveForm::begin([
    'id' => 'search-form',
    'action' => $search,
    'options' => [
        'id' => 'search-form',
        'class' => 'app-search search-form',
        'data-type' => 'JSON',
        'data-content-type' => 'application/json',
    ],
]); ?>

<?php $options = ['type' => 'search', 'class' => 'form-control', 'autocomplete' => 'email', 'placeholder' => Yii::t('form', 'Search & enter')]; ?>
<?//= $form
//    ->field($model, 'search')
//    ->textInput($options)
//    ->label(Yii::t('form', Yii::t('form', 'Search & enter'))); ?>
<?= Html::a('<i class="ti-close"></i>', '#', ['class' => 'srh-btn']); ?>

<?php ActiveForm::end(); ?>
<!-- ============================================================== -->
<!-- END Search -->
<!-- ============================================================== -->
