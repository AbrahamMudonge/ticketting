<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StaffDepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Staff Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-department-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Staff Department', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'user.username',
            'dept.deptmentName',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
