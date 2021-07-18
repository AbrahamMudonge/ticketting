<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Leaveapplication */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leaveapplication-form">

    <?php $form = ActiveForm::begin(); ?>
    <?=$form->errorSummary($model);?>
    <label  class  ="control-label">startDate</label>
    <?=
    DatePicker::widget([
        'model' => $model,
        'attribute' => 'startDate',
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'startDate' => date("Y-m-d"),
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>
    <label  class  ="control-label">endDate</label>
    <?=
    DatePicker::widget([
        'model' => $model,
        'attribute' => 'endDate',
        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'startDate' => date("Y-m-d"),
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>






        <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
