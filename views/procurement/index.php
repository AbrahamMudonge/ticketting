<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProcurementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Procurements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procurement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Procurement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'user.username',
            'client.ClientName',
            'order',
            'cost',
            'sellingPrice',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
