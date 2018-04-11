<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PollsQuestions */

$this->title = 'Update Polls Questions: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Polls Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="polls-questions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
