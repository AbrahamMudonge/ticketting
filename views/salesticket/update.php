<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Salesticket */

$this->title = 'Update Salesticket: ' . $model->salesticketID;
$this->params['breadcrumbs'][] = ['label' => 'Salestickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->salesticketID, 'url' => ['view', 'id' => $model->salesticketID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="salesticket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
