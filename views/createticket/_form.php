<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Sources;
use app\models\Clients;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Createticket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="createticket-form">

    <?php $form = ActiveForm::begin(); ?>
    <?=$form->errorSummary($model);?>

   

   
 <label  class  ="control-label">dateToday</label>
    <?=
    DatePicker::widget([
        'model' => $model,
        'attribute' => 'dateToday',
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'startDate' => date('Y-m-d'),
            'endDate' => date('Y-m-d'),]
    ]);
    ?>





    <?= $form->field($model, 'sourceID')->dropDownList(ArrayHelper::map(Sources::find()->all(), 'sourceID', 'sourceTitle'), ['prompt' => 'select  sourceTitle']) ?>

    <?= $form->field($model, 'clientID')->dropDownList(ArrayHelper::map(Clients::find()->all(), 'clientID', 'ClientName'), ['prompt' => 'select  client  Name']) ?>

    <?= $form->field($model, 'Description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Quantity')->textInput() ?>

    <?= $form->field($model, 'Cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
