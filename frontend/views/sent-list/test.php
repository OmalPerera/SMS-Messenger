<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use frontend\models\Message;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SentListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="sent-list-index">

<?php
    echo "string";
        print_r($_POST);
        echo Yii::$app->request->baseUrl;
        echo Url::home();
        echo " | ";
        echo Url::to (['sent-list/test'], true);

?>

    


    

    

</div>
