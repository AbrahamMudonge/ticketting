<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Banks */

$this->title = 'Update Banks: ' . $model->banksID;
$this->params['breadcrumbs'][] = ['label' => 'Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->banksID, 'url' => ['view', 'id' => $model->banksID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="banks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
