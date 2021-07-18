<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Leaveapplication */

$this->title = 'Update Leaveapplication: ' . $model->leaveApplicationID;
$this->params['breadcrumbs'][] = ['label' => 'Leaveapplications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->leaveApplicationID, 'url' => ['view', 'id' => $model->leaveApplicationID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="leaveapplication-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
