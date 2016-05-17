<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\MessageHistory */

$this->title = 'Create Message History';
$this->params['breadcrumbs'][] = ['label' => 'Message Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
