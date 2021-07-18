<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TechnicalticketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Technicaltickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="technicalticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Technicalticket', ['create'], ['class' => 'btn btn-success']) ?>
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
