<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientcontactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientcontacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientcontact-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Clientcontact', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'client.ClientName',
            'user.username',
            'cT.description',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
