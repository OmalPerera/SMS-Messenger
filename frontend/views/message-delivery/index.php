<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MessageDeliverySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Message Deliveries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-delivery-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Message Delivery', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'delivery_id',
            'message_id',
            'phone_number',
            'delivery_message',
            'delivery_date_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
