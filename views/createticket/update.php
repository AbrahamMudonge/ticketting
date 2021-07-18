<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Createticket */

$this->title = 'Update Createticket: ' . $model->createticketID;
$this->params['breadcrumbs'][] = ['label' => 'Createtickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->createticketID, 'url' => ['view', 'id' => $model->createticketID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="createticket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
