<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div>      
    <div id="user_def_banner-1">
        <div class="container-fluid">
            
            <div class="row" style="height: 75px"></div>
            
            <div class="row">
                <div class="col-lg-6 col-md-7 col-sm-8 col-xs-9" style="text-align: center;">
                    <img src="../web/images/logo.png" style="margin-right: 35px"/>
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
                    <div style="vertical-align: middle; text-align: center; padding-top: 40px">
                        <form>
                            <input class="user_def_registration-panel-fields" type="text" name="emailAddress" placeholder="E-mail address">
                            <br>
                            <input class="user_def_registration-panel-fields" type="text" name="password" placeholder="Password">
                            <br>
                            <input class="user_def_registration-panel-fields" type="text" name="validatePassword" Placeholder="Validate Password">
                            <br>
                            <input class="user_def_registration-panel-fields" type="text" name="mobileNumber" placeholder="Mobile Number">
                            <br>
                            <input class="user_def_registration-panel-btn"type="submit" value="Register Now">
                            <br>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div> 


