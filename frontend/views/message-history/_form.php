<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MessageHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'history_log_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message_sent_list')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
