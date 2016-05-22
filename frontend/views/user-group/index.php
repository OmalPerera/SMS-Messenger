<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use Yii;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @reason : removed to design the Interface
$this->title = 'User Groups';
$this->params['breadcrumbs'][] = $this->title;
*/
?>
<div class="user-group-index" style="padding-left:10px; padding-right:10px">

    <!--h1><?= Html::encode($this->title) ?></h1-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary'=>"",
        'showHeader' => false,
        'tableOptions' => ['class' => 'table table-hover'],
        'rowOptions' => ['class' => 'user_def_groups-list-row-option'],
        // to show table border   'tableOptions' => ['class' => 'table-bordered']

        //'filterModel' => $searchModel,
        //navigate to the relevent recipient list by click on the group name
        'rowOptions' => function ($model, $key, $index, $grid) {
                    return [
                        'style' => "cursor: pointer",
                        'id' => $model['group_id'],
                        'onclick' => 'location.href="'.Yii::$app->urlManager->createUrl('recipient-list/recipients').'&scenario=RECIPIENTS&params="+(this.id);',
                        //'id' => $model['group_id'],
                    ];  
                },

        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            //'group_id',
            //'group_owner_id',
            'group_name',
            //'group_registration_date',
            ['class' => 'yii\grid\ActionColumn',
            'visibleButtons' => ['view' => false],],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
