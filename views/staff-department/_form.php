<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Departments;
use dektrium\user\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\StaffDepartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-department-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'id')->dropDownList(ArrayHelper::map(User::find()->all(),'id','username'),['prompt'=>'select user']) ?>

<?= $form->field($model, 'deptID')->dropDownList(ArrayHelper::map(Departments::find()->all(), 'deptID', 'deptmentName'), ['prompt' => 'select  departmentName']) ?>

    <div class="form-group">
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
