<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Technicalticket */

$this->title = 'Update Technicalticket: ' . $model->technicalticketID;
$this->params['breadcrumbs'][] = ['label' => 'Technicaltickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->technicalticketID, 'url' => ['view', 'id' => $model->technicalticketID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="technicalticket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
