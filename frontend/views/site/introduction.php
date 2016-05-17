<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = 'SMS Messenger';
?>
<div class="row">
	<div class="row" style="text-align: center;">
		<img src="../web/images/intro.png" style="height:350px; margin-top:-10px"/>      
	</div>

	<div class="row" style="text-align: center;">
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
             
		
	
</div>

