<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\SentList */

$this->title = 'Create Sent List';
$this->params['breadcrumbs'][] = ['label' => 'Sent Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sent-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
