<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CreateticketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Createtickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="createticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Createticket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'dateCreated',
            'dateToday',
            'user.username',
            'source.sourceTitle',
            'client.ClientName',
            'Description',
            'Quantity',
            'Cost',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
