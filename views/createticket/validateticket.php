<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CreateticketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'VALIDATE  TICKET';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="createticket-validateticket">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>
        <?= Html::a('Create Createticket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

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
            'status.title',

            //['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{approve} {disapprove}',
                'visibleButtons' => [
                ],
                'buttons' => [
                    'approve' => function ($url, $model) {
                        $url = Url::to(['createticket/approveticket', 'id' => $model->createticketID]);

                        return Html::a('<span class=" btn btn-primary fa fa-thumbs-up"> Approve</span> ', $url, [
                                    'title' => 'Approve ticket',
                                    'data-confirm' => 'Are you sure you want to approve',
                                    'okay-button' => 'Yes ',
                                    'cancel-button' => 'No Cancel',
                                    'class' => 'confirm-link',
                        ]);
                    },
                            'disapprove' => function ($url, $model) {
                        $url = Url::to(['createticket/disapproveticket', 'id' => $model->createticketID]);

                        return Html::a('<span class=" btn btn-danger fa fa-thumbs-down"> Disapprove</span> ', $url, [
                                    'title' => 'Disapprove ticket',
                                    'data-confirm' => 'Are you sure you want to disapprove',
                                    'okay-button' => 'Yes ',
                                    'cancel-button' => 'No Cancel',
                                    'class' => 'confirm-link',
                        ]);
                    },
                        ]
                    ],
        ],
    ]); ?>


</div>
