<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\MessageDelivery */

$this->title = 'Update Message Delivery: ' . ' ' . $model->delivery_id;
$this->params['breadcrumbs'][] = ['label' => 'Message Deliveries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->delivery_id, 'url' => ['view', 'id' => $model->delivery_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="message-delivery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
