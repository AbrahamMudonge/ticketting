<?php

use yii\helpers\Url;
use yii\bootstrap\Html;
use app\helpers\PermissionsList;

/* @var $this yii\web\View */

$this->title = '';
?>
<div class="site-index" style="width:100%;">

    <div class="jumbotron">
        <h1><b>MACKPHILISA  ERP</b></h1>

        <p class="lead"></p>
        <p>
        <div id="info" style="border:1px #000 solid  ">
            <h4><b><i> Number Of Leave Days Remaining: <?= \app\models\Leaveapplication::myRemainingDays(Yii::$app->user->id) ?></i></b></h4>
            <?php
            if (!Yii::$app->user->getIsGuest()) {
                $user_role = app\models\User::findOne(Yii::$app->user->id)->role_id;

                $myTarget = 0;
                $totalProcurement = 0;


                $target = app\models\Targets::find()->where('id=:id', [':id' => Yii::$app->user->id])->one();
                if ($target) {
                    $myTarget = $target->targetDetail;
                }

                $procurements = app\models\Procurement::find()->where('id=:id', [':id' => Yii::$app->user->id])->all();
                foreach ($procurements as $procurement) {
                    $totalProcurement += $procurement->margins;
                }
                ?>
                <b> My Target</b>: <?= number_format($myTarget) ?><br>
                <b>My Sales</b>: <?= number_format($totalProcurement) ?><br>

                <b> Remaining Target</b>: <?= number_format($myTarget - ($totalProcurement)) ?><br>
            <?php }
            ?>
        </div><br>
        <!--        <h4>
                    SYSTEM  GUIDE
                </h4>
                FOR  YOU  TO  BE  ABLE  TO  CREATE  A  TICKET, YOU  MUST  KEY  IN  THE  CLIENTS  DETAILS  FIRST
                </p>-->
        <div class="body-content">

            <div class="row">

                <div class="col-lg-4">
                    <!--                    <h2>CREATE  TICKET</h2>
                    
                                        <p>CLICK  HERE  TO  CREATE  TICKET</p>-->

                    <?php if (\Yii::$app->user->can(PermissionsList::CREATE_CLIENT)) { ?>
                        <?= Html::a('<i>CREATE CLIENTS</i>', ['/clients/index'], ['class' => 'btn btn-lg btn-success btn-block']) ?><br>
                    <?php } ?>
                    <?php if (\Yii::$app->user->can(PermissionsList::CREATE_CLIENTCONTACT)) { ?>
                        <br>  <?= Html::a('<i>CLIENT CONTACT</i>', ['/clientcontact/index'], ['class' => 'btn btn-lg btn-success btn-block']) ?><br>
                    <?php } ?>
                    <?php if (\Yii::$app->user->can(PermissionsList::CREATE_CLIENTTYPES)) { ?>
                        <br>  <?= Html::a('<i>CLIENT TYPES</i>', ['/clienttypes/index'], ['class' => 'btn btn-lg btn-success btn-block']) ?>
                    <?php } ?>


                    

                </div>
                <div class="col-lg-4">
                    <?= Html::img('assets/images/logo.png'); ?>


                    <!--                    <h2>SET  TARGET</h2>
                    <>=
                                        <p>CLICK HERE  TO  SET  TARGET</p>-->
                    <?php if (\Yii::$app->user->can(PermissionsList::CREATE_SUPPLIER)) { ?>
                        <?= Html::a('CREATE  SUPPLIER', ['/suppliers/index'], ['class' => 'btn btn-lg btn-success btn-block']) ?>
                    <?php } ?>
                    <?php if (\Yii::$app->user->can(PermissionsList::CREATE_SUPPLIERCONTACT)) { ?>
                        <?= Html::a('SUPPLIER  CONTACTS', ['/supplierscontact/index'], ['class' => 'btn btn-lg btn-success btn-block']) ?>

                    <?php } ?>
                    <?php if (\Yii::$app->user->can(PermissionsList::CREATE_SUPPLIERTYPES)) { ?>
                        <?= Html::a('SUPPLIER  TYPES', ['/suppliertypes/index'], ['class' => 'btn btn-lg btn-success btn-block']) ?>
                    <?php } ?>
                    <?php if (\Yii::$app->user->can(PermissionsList::CREATE_PROCUREMENT)) { ?>
                        <?= Html::a('CREATE  PROCUREMENT', ['/procurement/index'], ['class' => 'btn btn-lg btn-success btn-block']) ?>
                    <?php } ?>
                    <?php if (\Yii::$app->user->can(PermissionsList::VIEW_MARGINS)) { ?>
                        <?= Html::a('MARGINS', ['/procuremment/margins'], ['class' => 'btn btn-lg btn-success btn-block']) ?>
                    <?php } ?>




                </div>
                <div class="col-lg-4">
                    <!--                    <h2>LEAVE  APPLICATION</h2>
                    
                    
                                        <p>CLICK  THE  BUTTON  BELOW  TO  APPLY  FOR  LEAVE</p>-->

                    <?php if (\Yii::$app->user->can(PermissionsList::SET_TARGETS)) { ?>
                        <?= Html::a('SET TARGET', ['/targets/index'], ['class' => 'btn btn-lg btn-success btn-block']) ?><br>
                    <?php } ?>
                         <?php if (\Yii::$app->user->can(PermissionsList::CREATE_TICKET)) { ?>
                    <br>  <?= Html::a('CREATE  TICKET', ['/createticket/index'], ['class' => 'btn btn-lg btn-success btn-block']) ?><br>
                             <?php } ?>
                    <?php if (\Yii::$app->user->can(PermissionsList::APPLY_LEAVE)) { ?>
                    <br>  <?= Html::a('APPLY LEAVE', ['/leaveapplication/index'], ['class' => 'btn btn-lg btn-success btn-block']) ?>
                        <?php } ?>
                    

                </div>
                <div class="col-lg-4">
                    <!--                    <h2>INPUT  CLIENT  DETAILS</h2>-->


                </div><br>
            </div>

        </div>



    </div>
