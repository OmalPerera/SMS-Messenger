<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SentList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sent-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sent_list_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipient_phone_number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
