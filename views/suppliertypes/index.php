<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuppliertypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Suppliertypes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suppliertypes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Suppliertypes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'supplier.supplierName',
            'supplierTitlle',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
