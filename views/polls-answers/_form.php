<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PollsAnswers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="polls-answers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php foreach ($testq as $item): ?>
        <?= $item['title']; ?><br>
        <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'question_id')->hiddenInput(['question_id' => $item['id'] ]) ?>
    <?php endforeach;?>

    <div class="form-group">
        <?= Html::submitButton('Ответить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
