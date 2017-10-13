<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\MessageHistory */

$this->title = 'Complete History';
$this->params['breadcrumbs'][] = ['label' => 'Message Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-history-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <br/><br/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'history_log_id',
            //'message_id',
            //'message_sent_list',
            //'delivery_id',

            'message.message_body',
            'message.message_sent_group',
            'messageSentList.recipient_phone_number',
            'message.message_create_date',
            'delivery.delivery_message',

        ],
    ]) ?>

    <p>
        <!--<?= Html::a('Update', ['update', 'id' => $model->history_log_id], ['class' => 'btn btn-primary']) ?> -->
        <?= Html::a('Delete', ['delete', 'id' => $model->history_log_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
