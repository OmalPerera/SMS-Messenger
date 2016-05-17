<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RecipientListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipient-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'recipient_list_id') ?>

    <?= $form->field($model, 'group_id') ?>

    <?= $form->field($model, 'recipient_name') ?>

    <?= $form->field($model, 'recipient_phone_number') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
