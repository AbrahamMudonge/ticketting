<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clienttypes */

$this->title = 'Update Clienttypes: ' . $model->CTID;
$this->params['breadcrumbs'][] = ['label' => 'Clienttypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CTID, 'url' => ['view', 'id' => $model->CTID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clienttypes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
