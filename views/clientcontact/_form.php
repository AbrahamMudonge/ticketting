<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Clients;
use app\models\Clienttypes;

/* @var $this yii\web\View */
/* @var $model app\models\Clientcontact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientcontact-form">

    <?php $form = ActiveForm::begin(); ?>
<?= $form->errorSummary($model); ?>

<?= $form->field($model, 'clientID')->dropDownList(ArrayHelper::map(Clients::find()->all(), 'clientID', 'ClientName'), ['prompt' => 'select  ClientName']) ?>


<?= $form->field($model, 'CTID')->dropDownList(ArrayHelper::map(Clienttypes::find()->all(), 'CTID', 'description'), ['prompt' => 'select  description']) ?>



    <div class="form-group">
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
