<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-roles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
