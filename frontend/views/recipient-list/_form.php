<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RecipientList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipient-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--?= $form->field($model, 'group_id')->textInput() ?-->

    <?= $form->field($model, 'recipient_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recipient_phone_number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
