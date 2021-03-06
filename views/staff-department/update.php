<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StaffDepartment */

$this->title = 'Update Staff Department: ' . $model->staffDeptID;
$this->params['breadcrumbs'][] = ['label' => 'Staff Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->staffDeptID, 'url' => ['view', 'id' => $model->staffDeptID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="staff-department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
