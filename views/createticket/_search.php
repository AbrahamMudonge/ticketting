<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CreateticketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="createticket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'createticketID') ?>

    <?= $form->field($model, 'dateCreated') ?>

    <?= $form->field($model, 'dateToday') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sourceID') ?>

    <?php // echo $form->field($model, 'clientID') ?>

    <?php // echo $form->field($model, 'Description') ?>

    <?php // echo $form->field($model, 'Quantity') ?>

    <?php // echo $form->field($model, 'Cost') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
