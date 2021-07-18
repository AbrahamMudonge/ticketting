<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Banks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'banksID')->textInput() ?>

    <?= $form->field($model, 'bankName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branchName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
