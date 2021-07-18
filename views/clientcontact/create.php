<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clientcontact */

$this->title = 'Create Clientcontact';
$this->params['breadcrumbs'][] = ['label' => 'Clientcontacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientcontact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
