<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MessageHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Message Histories';
//$this->params['breadcrumbs'][] = $this->title;
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
            [
                'attribute' => 'message.message_body',
                'label' =>'Message',
                'contentOptions' => ['style'=>' overflow: hidden; max-width: 60ch;'],
            ],
            [
                'attribute' => 'message.message_sent_group',
                'label' =>'Group',
            ],
            //'message_sent_list',
            [
                'attribute' => 'messageSentList.recipient_phone_number',
                'label' =>'Recipients',
            ],
            [
                'attribute' => 'message.message_create_date',
                'label' =>'Date',
            ],
            //'delivery_id',
            'delivery.delivery_message',

            ['class' => 'yii\grid\ActionColumn',
            'visibleButtons' => ['update' => false,],
            ],
        ],
    ]); ?>

</div>
