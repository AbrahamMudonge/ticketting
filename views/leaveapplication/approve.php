<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LeaveapplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'APPROVE LEAVE';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leaveapplication-approve">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user.username',
            'startDate',
            'endDate',
            'comment',
            'leaveDays',
            'remainingDays',
            'status.title',
//            ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{approve} {disapprove}',
                'visibleButtons' => [
                ],
                'buttons' => [
                    'approve' => function ($url, $model) {
                        $url = Url::to(['leaveapplication/approveleave', 'id' => $model->leaveApplicationID]);

                        return Html::a('<span class=" btn btn-primary fa fa-thumbs-up"> Approve</span> ', $url, [
                                    'title' => 'Approve Leave Application',
                                    'data-confirm' => 'Are you sure you want to approve',
                                    'okay-button' => 'Yes ',
                                    'cancel-button' => 'No Cancel',
                                    'class' => 'confirm-link',
                        ]);
                    },
                            'disapprove' => function ($url, $model) {
                        $url = Url::to(['leaveapplication/disapproveleave', 'id' => $model->leaveApplicationID]);

                        return Html::a('<span class=" btn btn-danger fa fa-thumbs-down"> Disapprove</span> ', $url, [
                                    'title' => 'Disapprove Leave Application',
                                    'data-confirm' => 'Are you sure you want to disapprove',
                                    'okay-button' => 'Yes ',
                                    'cancel-button' => 'No Cancel',
                                    'class' => 'confirm-link',
                        ]);
                    },
                        ]
                    ],
                ],
            ]);
            ?>


</div>
