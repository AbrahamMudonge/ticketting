<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dektrium\user\models\User;
use app\models\Clients;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Procurement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="procurement-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'id')->dropDownList(ArrayHelper::map(User::find()->all(),'id','username'),['prompt'=>'select user']) ?>

    <?= $form->field($model, 'clientID')->dropDownList(ArrayHelper::map(Clients::find()->all(),'clientID','ClientName'),['prompt'=>'select  client  name']) ?>

    <?= $form->field($model, 'order')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'sellingPrice')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
