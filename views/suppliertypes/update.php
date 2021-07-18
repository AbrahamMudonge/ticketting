<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Suppliertypes */

$this->title = 'Update Suppliertypes: ' . $model->suppliertypesID;
$this->params['breadcrumbs'][] = ['label' => 'Suppliertypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->suppliertypesID, 'url' => ['view', 'id' => $model->suppliertypesID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="suppliertypes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
