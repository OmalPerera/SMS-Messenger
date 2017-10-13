<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserGroup */

$this->title = 'Update your Group'; //. ' ' . $model->group_id;
//$this->params['breadcrumbs'][] = ['label' => 'User Groups', 'url' => ['recipient-list/recipients'.'&scenario=RECIPIENTS&params='.$model->group_id]];
//$this->params['breadcrumbs'][] = ['label' => $model->group_id, 'url' => ['view', 'id' => $model->group_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
