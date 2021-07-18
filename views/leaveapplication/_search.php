<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LeaveapplicationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leaveapplication-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'leaveApplicationID') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'startDate') ?>

    <?= $form->field($model, 'endDate') ?>

    <?= $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'statusID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
