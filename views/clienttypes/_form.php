<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Clients;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Clienttypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clienttypes-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model); ?>


    <?= $form->field($model, 'clientID')->dropDownList(ArrayHelper::map(Clients::find()->all(), 'clientID', 'ClientName'), ['prompt' => 'select  ClientName']) ?>



    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
