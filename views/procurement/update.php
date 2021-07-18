<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Procurement */

$this->title = 'Update Procurement: ' . $model->procurementID;
$this->params['breadcrumbs'][] = ['label' => 'Procurements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->procurementID, 'url' => ['view', 'id' => $model->procurementID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="procurement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
