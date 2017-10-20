<?php

/* @var $this yii\web\View */

$this->title = 'SMS Messenger';
?>
<div>
    <div id="user_def_banner-1">
        <div class="container-fluid">

            <div class="row" style="height: 75px"></div>

            <div class="row">
                <div class="col-lg-6 col-md-7 col-sm-8 col-xs-9" style="text-align: center;">
                    <img src="..site/views/frontend/images/logo.png" style="margin-right: 35px"/>
                </div>

                <div class="col-lg-6 col-md-5 col-sm-4 col-xs-3">
                    <a href="index.php?r=site%2Flogin">
                        <button type="button" class="user_def_rounded-corners user_def_login-btn user_def_login-button-background">
                            <p id="user_def_login-btn-typo">Login</p>
                        </button>
                    </a>
                </div>
            </div>




            <div style="position: relative">
                <div id="user_def_registration-panel-background" class="user_def_rounded-corners">
                    <div>
                        <p id="user_def_registration-form-header">Create your account for free!</p>
                        <p id="user_def_registration-form-sub-header">Easy & quick account creation for everyone.</p>
                    </div>
                    <div style="vertical-align: middle; text-align: center; padding-top: 35px">


                        <?php

                            /* @var $this yii\web\View */
                            /* @var $form yii\bootstrap\ActiveForm */
                            /* @var $model \frontend\models\SignupForm */

                            use yii\helpers\Html;
                            use yii\bootstrap\ActiveForm;

                            $this->title = 'SMS Messenger';
                            $this->params['breadcrumbs'][] = $this->title;
                        ?>
                            <!--div class="site-signup">

                                <div class="row">
                                    <div class="col-lg-5"-->
                                        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                                        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'user_def_registration-panel-fields', 'placeholder'=>'User name'])->label(false) ?>
                                        <?= $form->field($model, 'email')->textInput(['class'=>'user_def_registration-panel-fields', 'placeholder'=>'E-mail address'])->label(false) ?>
                                        <?= $form->field($model, 'password')->passwordInput()->textInput(['class'=>'user_def_registration-panel-fields','placeholder'=>'Password'])->label(false) ?>
                                        <?= $form->field($model, 'user_phone_number')->textInput(['class'=>'user_def_registration-panel-fields', 'placeholder'=>'Mobile number'])->label(false) ?>

                                        <!--div class="user_def_registration-panel-btn"-->
                                            <?= Html::submitButton('Register Now', ['class' => 'user_def_registration-panel-btn', 'name' => 'signup-button']) ?>
                                        <!--/div-->

                                        <?php ActiveForm::end(); ?>
                                    <!--/div>
                                </div>
                            </div-->

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
