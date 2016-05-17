<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MessageDelivery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-delivery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'delivery_id')->textInput() ?>

    <?= $form->field($model, 'message_id')->textInput() ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery_message')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery_date_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
