<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messages';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <!--?= Html::a('Create Message', ['create'], ['class' => 'btn btn-success']) ?-->

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'message_id',
            //'message_subject',
            'message_body',
            'message_create_date',
            //'message_author_id',

            ['class' => 'yii\grid\ActionColumn','visibleButtons' => ['view' => false, 'update' => false]],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
