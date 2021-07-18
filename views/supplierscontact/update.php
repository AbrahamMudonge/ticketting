<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Supplierscontact */

$this->title = 'Update Supplierscontact: ' . $model->suppliercontactID;
$this->params['breadcrumbs'][] = ['label' => 'Supplierscontacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->suppliercontactID, 'url' => ['view', 'id' => $model->suppliercontactID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="supplierscontact-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
