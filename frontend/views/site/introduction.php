<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use frontend\models\UserGroup;
use yii\db\Query;

/* @var $this yii\web\View */

$this->title = 'SMS Messenger';
?>
<div class="row">
	<div class="row" style="text-align: center;">
		<img src="../web/images/intro.png" style="height:350px; margin-top:-10px"/>      
	</div>

	<div class="row" id="introToNewUser" style="text-align: center;">
		<p style="font-size:30px; padding-top:40px; padding-bottom:10px"><b>Let's use groups to manage people</b></p>
		<?= Html::button('Create Groups', ['value'=>Url::to('index.php?r=user-group/create'),'class' => 'btn btn-primary', 'id'=>'create_groups_button', 'style' => 'background-color: #075a9b; font-size:18px; background-repeat:no-repeat; border:none; cursor:pointer; overflow: hidden; outline:none;']) ?>
    </div>


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




    
        <?php

            //$user_model = new User();
            $currently_logged_userid = Yii::$app->user->identity->id;
            //echo "$currently_logged_userid";

            $query = new Query;
            $query->select('group_id')
                  ->from('user_group')                               
                  ->where(['group_owner_id' => $currently_logged_userid]);

            $group_id_array = $query->all();
            $number_of_groups = $query->count();





            if($number_of_groups < 1){
                $redirecting_url = "0";
        ?>
            <style type="text/css">
                #introToregularUsers{
                    display:none;
                }
            </style>
        <?php
                
            }else{
                $first_group_id = $group_id_array["0"]["group_id"];

                $session_first_group_id = Yii::$app->session;
                $session_first_group_id->open();
                $session_first_group_id['group_id'] = $first_group_id;

        //var_dump($session_first_group_id['group_id']);
                $_SESSION[$first_group_id] = $first_group_id;
                //echo "$_SESSION[$first_group_id]";
                //echo "$first_group_id";
                $redirecting_url = "?r=recipient-list%2Frecipients&scenario=RECIPIENTS&params="."$first_group_id";

        ?>
            <style type="text/css">
                #introToNewUser{
                    display:none;
                }
            </style>
        <?php
            }
        ?>   


    <div class="row" id="introToregularUsers" style="text-align: center;">
        <p style="font-size:30px; padding-top:40px; padding-bottom:10px"><b>You have already created Groups!</b></p>
        <?= Html::button('Manage Groups', ['value'=>Url::to($redirecting_url),'class' => 'btn btn-primary',  'id'=>'manage_groups_button', 'style' => 'background-color: #075a9b; font-size:18px; background-repeat:no-repeat; border:none; cursor:pointer; overflow: hidden; outline:none;']) ?>
    </div>  
</div>

