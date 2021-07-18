<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Suppliers;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Suppliertypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="suppliertypes-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'supplierID')->dropDownList(Arrayhelper::map(Suppliers::find()->all(),'supplierID','supplierName'),['prompt'=>'Select  SupplierName']) ?>

    <?= $form->field($model, 'supplierTitlle')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
