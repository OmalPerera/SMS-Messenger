<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SentList */

$this->title = 'Update Sent List: ' . ' ' . $model->sent_list_id;
$this->params['breadcrumbs'][] = ['label' => 'Sent Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sent_list_id, 'url' => ['view', 'id' => $model->sent_list_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sent-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
