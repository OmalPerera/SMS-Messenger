<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use frontend\models\UserGroup;
use yii\db\Query;

/* @var $this yii\web\View */

$this->title = 'Introduction - smsHailer';
?>

<div class="chrome webkit mac x1 Locale_en_GB" dir="ltr">
	<div class="_3v_p _54kd _5do8" id="u_0_6">
		<div style="text-align: center">
			<div class="_3v_x">
				<!--middle Form Contents _210j ; _3v_x -->
				<div class="_3v_v" style="padding-right: 0px; display: inline-block">
					<div>
						<img class="img" src="images/introduction.jpg" alt="" width="240" height="240" >
					</div>



					<div class="row" id="introToNewUser" style="text-align: center;">
						<p style="font-size:28px; padding-top:30px; padding-bottom:10px"><b>Let's use groups to manage people</b></p>
						<div class="_3v_w" id="u_0_2">
							<div class="_3v_u" style="text-align: center; font-weight:400">
									<?= Html::submitButton('Create Groups', ['value'=>Url::to('index.php?r=user-group/create'), 'id'=>'create_groups_button', 'class' => '_42ft _4jy0 _2m_r _43dh _4jy4 _517h _51sy', 'name' => 'signup-button', 'tabindex' => 1]) ?>
							</div>
						</div>
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
						<p style="font-size:25px; padding-top:30px; padding-bottom:10px"><b>You have already created Groups!</b></p>
						<div class="_3v_w" id="u_0_2">
							<div class="_3v_u" style="text-align: center; font-weight:400">
									<?= Html::submitButton('Let`s send messages', ['value'=>Url::to($redirecting_url), 'id'=>'manage_groups_button', 'class' => '_42ft _4jy0 _2m_r _43dh _4jy4 _517h _51sy', 'name' => 'signup-button', 'tabindex' => 1]) ?>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>
