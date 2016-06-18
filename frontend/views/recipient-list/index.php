<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
use frontend\models\Message;



/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RecipientListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @reason : removed to design the Interface
$this->title = 'Recipient Lists';
$this->params['breadcrumbs'][] = $this->title;
*/
?>

<div class="recipient-list-index row" style="margin-left:5px ; ">

    <!-- ************** START : Top row with the banner ************** -->
        <div class="row" style="padding-bottom:30px;">
            <div class="col-lg-3 col-md-3 col-sm-3">
            </div>

            <div class="col-lg-9 col-md-9 col-sm-9">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 user_def_recipient-list-index-top-banner-div" >
                        <p class="user_def_recipient-list-index-top-banner-text">Create your own group & manage messaging</p>
                        <?= Html::button('CREATE GROUPS NOW', 
                            ['value'=>Url::to('index.php?r=user-group/create'),
                            'class' => 'btn btn-primary user_def_recipient-list-index-top-banner-create-group-button', 
                            'id'=>'create_groups_button']) 
                        ?>
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
            <div class="col-lg-3 col-md-3 col-sm-3" style="padding-right: 40px;">
                <h4 class="user_def_group_heading">Groups</h4>
                <?php Pjax::begin(); ?>
                    <div id="group_list"></div>
                <?php Pjax::end(); ?>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-9">
                <div class="user_def_recipient-list-index-recipient-gridview">
                    <!--    @reason : removed to design the Interface
                    <h1><?= Html::encode($this->title) ?></h1>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    -->

                    <?= Html::button('Add a recipient', 
                        [
                            'value'=>Url::to('index.php?r=recipient-list/create'),
                            'class' => 'btn btn-primary', 
                            'id'=>'create_recipient_button', 
                            'style' =>  'cursor:pointer; position:absolute; right: 10%; background-color: #075a9b;'
                        ]
                    ) ?>
                    


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
                        'rowOptions' => ['class' => 'user_def_recipient-list-row-option'],

                        // to show table border   'tableOptions' => ['class' => 'table-bordered']
                        'columns' => [
                            //['class' => 'yii\grid\SerialColumn'],
                            //'recipient_list_id',
                            ['class' => 'yii\grid\CheckboxColumn'],
                            //'group_id',
                            'recipient_name',
                            'recipient_phone_number',
                            ['class' => 'yii\grid\ActionColumn',
                                'visibleButtons' => ['view' => false],
                            ]
                        ],
                    ]); ?>


                    
                    
                </div>
            </div>

        </div>
    <!-- ************** END : row with User-Group list & corresponding recipient list ************** -->


        

            
        <div class="navbar-fixed-bottom row" style="height: 100px" >
            <div class="col-lg-3 col-md-3 col-sm-3">
            </div>

            <div class="col-lg-9 col-md-9 col-sm-9">
                <div class="user_def_message_div">

                    <?php $form = ActiveForm::begin(['id' => 'user_msg',/*'action' => Url::to(['message/create'])*/ ]); 
                        $msg_model = new Message();
                    ?>
                        <div class="row" style="text-align:center">
                            <div class="col-lg-10 col-md-10 col-lsm-10 col-xs-10 ">
                                <?= $form->field($msg_model, 'message_body')->textInput(['maxlength' => true])->label(false) ->textArea(['id'=>'user_msg_input', 'placeholder'=>'Say something...', 'class'=>'user_def_msg-input']) ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <?= Html::submitButton($msg_model->isNewRecord ? 'SEND' : 'Update', ['class' => 'btn btn-primary user_def_msg-send-button', 'id'=>'msg_send_button']) ?>
                            </div>
                        </div>   
                    <?php ActiveForm::end(); ?>


                </div>
            </div>
        </div>
    

                

</div>
