<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RecipientListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @reason : removed to design the Interface
$this->title = 'Recipient Lists';
$this->params['breadcrumbs'][] = $this->title;
*/
?>

<div class="recipient-list-index row">

    <!-- ************** START : Top row with the banner ************** -->
        <div class="row" style="padding-bottom:30px">
            <div class="col-lg-2 col-md-2 col-sm-2"> 
            </div>

            <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 " style="height:110px; width:90%; background-color:#075a9b; margin:auto;">
                        <p style="font-size:15px; color:#ffffff; padding-left:20px; padding-top:20px">Create your own group & manage messaging</p>
                        <?= Html::button('CREATE GROUPS NOW', ['value'=>Url::to('index.php?r=user-group/create'),'class' => 'btn btn-success', 'id'=>'create_groups_button', 'style' => 'background-color: Transparent; background-repeat:no-repeat; border:none; cursor:pointer; overflow: hidden; outline:none; position:absolute; bottom: 5px; right: 5px;']) ?>
                        <!-- Use to create popup form for create Groups -->
                            <?php
                                Modal::begin([
                                    //'header'=>'<h4>Groups</h4>',
                                    'id'=>'create_groups_modal',
                                    'size'=>'modal-md',
                                ]);
                                echo "<div id='create_groups_modalContent'></div>";
                                Modal::end();

                            ?>
                        <!-- ****************************************** -->

                    </div>
                </div>  
            </div>
        </div>
    <!-- ************** END : Top row with the banner ************** -->








    <!-- ************** START : row with User-Group list & corresponding recipient list ************** -->

        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2">
                <?php Pjax::begin(); ?>
                <div id="group_list" style="width:100%;"></div>
                <?php Pjax::end(); ?>
            </div>

            <div class="col-lg-10 col-md-10 col-sm-10">
                <!--    @reason : removed to design the Interface
                <h1><?= Html::encode($this->title) ?></h1>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                -->

                <?= Html::button('Add a recipient', ['value'=>Url::to('index.php?r=recipient-list/create'),'class' => 'btn btn-primary', 'id'=>'create_recipient_button', 'style' =>  'cursor:pointer; position:absolute; right: 10%;']) ?>
                


                <!-- Uses for popup form to create recipient -->
                    <?php
                        Modal::begin([
                            //'header'=>'<h4>Recipient List</h4>',
                            'id'=>'create_recipient_modal',
                            'size'=>'modal-md',
                        ]);
                        echo "<div id='create_recipient_modalContent'></div>";
                        Modal::end();
                    ?>
                <!-- *************************************** -->
                
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    //'showHeader' => false,
                    'id' => 'recipient_list_grid',
                    'tableOptions' => ['class' => 'table table-hover'],
                    // to show table border   'tableOptions' => ['class' => 'table-bordered']
                    'columns' => [
                        //['class' => 'yii\grid\SerialColumn'],
                        //'recipient_list_id',
                        ['class' => 'yii\grid\CheckboxColumn'],
                        //'group_id',
                        'recipient_name',
                        'recipient_phone_number',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>


                <p>
                    <?= Html::input(['id'=>'msg_input', 'style' => 'width: 200px;']) ?>
                    <?= Html::button('SEND', ['class' => 'btn btn-primary', 'id'=>'msg_send_button']) ?>
                </p>
                

            </div>

        </div>
    <!-- ************** END : row with User-Group list & corresponding recipient list ************** -->


                

</div>
