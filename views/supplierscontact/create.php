<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Supplierscontact */

$this->title = 'Create Supplierscontact';
$this->params['breadcrumbs'][] = ['label' => 'Supplierscontacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplierscontact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
