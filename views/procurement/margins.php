<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProcurementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calculate  Margins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procurement-margins">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'procurementID',
            'user.username',
            'client.ClientName',
            'order',
            'cost',
            'sellingPrice',
            'margins',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
