<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PollsQuestions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="polls-questions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'polls_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Polls::find()->all(), 'id', 'title')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
