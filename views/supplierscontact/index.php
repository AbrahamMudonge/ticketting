<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SupplierscontactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supplierscontacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplierscontact-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Supplierscontact', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'user.username',
            'supplier.supplierName',
            'phone',
            'email:email',
            //'landLine',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
