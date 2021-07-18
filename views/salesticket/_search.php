<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalesticketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salesticket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'salesticketID') ?>

    <?= $form->field($model, 'dateCreated') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sourceID') ?>

    <?= $form->field($model, 'clientID') ?>

    <?php // echo $form->field($model, 'FullDetails') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
