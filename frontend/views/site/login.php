<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>


<div class="chrome webkit mac x1 Locale_en_GB" dir="ltr">
  <div class="_3v_p _54kd _5do8" id="u_0_6">
    <div class="_3v_x">
      <div class="_210j">
        <div class="_3v_v">
          <div class="_3400">
            <img class="img" src="images/login_index_logo.png" alt="" width="120" height="120" ></div>
          <h1 class="_5hy4">smsHailer</h1>
          <div class="_3403">Sign in to get started.</div>
          <div class="_3v_w" id="u_0_2">
            <div class="_3v_u" style="text-align: center">

              <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                  <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Email address or User name', 'tabindex' => 1])->label(false) ?>

                  <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password', 'tabindex' => 1])->label(false) ?>

                  <?= $form->field($model, 'rememberMe')->checkbox(['class' => 'uiInputLabelLabel', 'tabindex' => 1])->label('Keep me signed in') ?>

                  <div class="form-group">
                      <?= Html::submitButton('Sign In', ['class' => '_42ft _4jy0 _2m_r _43dh _4jy4 _517h _51sy', 'name' => 'login-button', 'tabindex' => 1]) ?>
                  </div>

                  <div>
                      If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                  </div>

              <?php ActiveForm::end(); ?>

            </div>
          </div>
        </div>
        <div class="_3v_-">
          <div class="_3w05"><img class="img" src="images/login_page_large.jpg" alt="" width="944" height="570"></div>
        </div>
      </div>
      <div class="_yws hidden_elem" id="u_0_5"></div>
    </div>
    <div>
    </div>
