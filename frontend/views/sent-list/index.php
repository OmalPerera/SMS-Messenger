<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SentListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sent Lists';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sent-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--p>
        <?= Html::a('Create Sent List', ['create'], ['class' => 'btn btn-success']) ?>
    </p-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'sent_list_id',
            'recipient_phone_number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
