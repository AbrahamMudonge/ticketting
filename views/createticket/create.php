<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Createticket */

$this->title = 'Create Createticket';
$this->params['breadcrumbs'][] = ['label' => 'Createtickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="createticket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
