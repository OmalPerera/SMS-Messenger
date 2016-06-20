<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MessageHistorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-history-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'history_log_id') ?>

    <?= $form->field($model, 'message_id') ?>

    <?= $form->field($model, 'message_sent_list') ?>

    <?= $form->field($model, 'delivery_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
