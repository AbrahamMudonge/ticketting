<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Suppliers */

$this->title = 'Update Suppliers: ' . $model->supplierID;
$this->params['breadcrumbs'][] = ['label' => 'Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->supplierID, 'url' => ['view', 'id' => $model->supplierID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="suppliers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
