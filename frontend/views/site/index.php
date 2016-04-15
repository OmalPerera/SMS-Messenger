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
            
            <div class="row">
                <div class="col-lg-6 col-md-5 col-sm-3 col-xs-1">
                    <div id="user_def_fake-panel-background">
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-9 col-xs-11">
                    <div id="user_def_registration-panel-background" class="user_def_rounded-corners">
                        <div class="conitainer">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon" id="basic-addon1">@</span>
                            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div> 


