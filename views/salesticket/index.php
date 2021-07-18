<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesticketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salestickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salesticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Salesticket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'dateCreated',
            'user.username',
            'source.sourceTitle',
            'client.ClientName',
            'FullDetails',
            'quantity',
            'cost',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
