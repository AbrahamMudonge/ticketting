<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProcurementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="procurement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'procurementID') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'clientID') ?>

    <?= $form->field($model, 'order') ?>

    <?= $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'sellingPrice') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
