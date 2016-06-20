<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MessageHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Message Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-history-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--p>
        <?= Html::a('Create Message History', ['create'], ['class' => 'btn btn-success']) ?>
    </p-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'history_log_id',
            //'message_id',
            'message.message_body',
            'message.message_sent_group',
            //'message_sent_list',
            'messageSentList.recipient_phone_number',
            'message.message_create_date',
            'delivery_id',

            ['class' => 'yii\grid\ActionColumn',
            'visibleButtons' => ['view' => false, 'update' => false,],
            ],
        ],
    ]); ?>

</div>
