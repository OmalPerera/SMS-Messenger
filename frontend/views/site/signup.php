<?php

  /* @var $this yii\web\View */
  /* @var $form yii\bootstrap\ActiveForm */
  /* @var $model \frontend\models\SignupForm */

  use yii\helpers\Html;
  use yii\bootstrap\ActiveForm;

  $this->title = 'Register - Messej';
?>


<div class="chrome webkit mac x1 Locale_en_GB" dir="ltr">
  <div class="_3v_p _54kd _5do8" id="u_0_6">
    <div style="text-align: center">
    <div class="_3v_x">
        <!--middle Form Contents _210j ; _3v_x -->
        <div class="_3v_v" style="padding-right: 0px; display: inline-block">
          <div class="_3400">
            <img class="img" src="images/login_index_logo.png" alt="" width="120" height="120" >
          </div>
          <h1 class="_5hy4">Messej</h1>
          <div class="_3403">Get Register to send Bulk messages.</div>
          <div class="_3v_w" id="u_0_2">
            <div class="_3v_u" style="text-align: center; font-weight:400">


              <?php $form = ActiveForm::begin(['id' => 'login-signup']); ?>

              <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'User name', 'tabindex' => 1])->label(false) ?>

              <?= $form->field($model, 'email')->input('email', ['autofocus' => true, 'placeholder' => 'E-mail address', 'tabindex' => 1])->label(false) ?>

              <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password', 'tabindex' => 1])->hint('')->label(false) ?>

              <?= $form->field($model, 'user_phone_number')->textInput(['placeholder' => 'Mobile number', 'tabindex' => 1])->label(false) ?>

              <div class="form-group">
                  <?= Html::submitButton('Create an Account', ['class' => '_42ft _4jy0 _2m_r _43dh _4jy4 _517h _51sy', 'name' => 'signup-button', 'tabindex' => 1]) ?>
                </div>

                <?php ActiveForm::end(); ?>


            </div>
          </div>
        </div>
    </div>
  </div>
  </div>
</div>
