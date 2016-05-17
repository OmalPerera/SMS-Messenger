<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\RecipientList */

$this->title = 'Update Recipient List: ' . ' ' . $model->recipient_list_id;
$this->params['breadcrumbs'][] = ['label' => 'Recipient Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recipient_list_id, 'url' => ['view', 'id' => $model->recipient_list_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recipient-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
