<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Suppliers;

/* @var $this yii\web\View */
/* @var $model app\models\Supplierscontact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supplierscontact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'supplierID')->dropDownList(ArrayHelper::map(Suppliers::find()->all(), 'supplierID', 'supplierName'), ['prompt' => 'select supplierName']) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'landLine')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
