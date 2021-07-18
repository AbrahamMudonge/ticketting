<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Leaveapplication */

$this->title = 'Create Leaveapplication';
$this->params['breadcrumbs'][] = ['label' => 'Leaveapplications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leaveapplication-create">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?php
    if($model->getRemainingDays() <= 0){
        echo '<div class="row"><div class="col-md-12"><center><h2 class="h2 text-muted">Sorry '.$model->user->username.', you have exhausted your leave days.</h2></center></div></div>';
    } else {
        echo $this->render('_form', [
        'model' => $model,
        ]); 
    }?>

</div>
