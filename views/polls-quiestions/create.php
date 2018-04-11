<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PollsQuestions */

$this->title = 'Create Polls Questions';
$this->params['breadcrumbs'][] = ['label' => 'Polls Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="polls-questions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
