<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\MessageDelivery */

$this->title = 'Create Message Delivery';
$this->params['breadcrumbs'][] = ['label' => 'Message Deliveries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-delivery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
