<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MessageDeliverySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-delivery-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'delivery_id') ?>

    <?= $form->field($model, 'message_id') ?>

    <?= $form->field($model, 'phone_number') ?>

    <?= $form->field($model, 'delivery_message') ?>

    <?= $form->field($model, 'delivery_date_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
