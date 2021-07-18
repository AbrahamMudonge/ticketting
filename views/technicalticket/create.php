<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Technicalticket */

$this->title = 'Create Technicalticket';
$this->params['breadcrumbs'][] = ['label' => 'Technicaltickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="technicalticket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
