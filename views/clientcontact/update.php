<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clientcontact */

$this->title = 'Update Clientcontact: ' . $model->CCID;
$this->params['breadcrumbs'][] = ['label' => 'Clientcontacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CCID, 'url' => ['view', 'id' => $model->CCID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clientcontact-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
