<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LeaveapplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leaveapplications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leaveapplication-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Leaveapplication', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'leaveApplicationID',
            'user.username',
            'startDate',
            'endDate',
            'comment',
            
            //'statusID',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
