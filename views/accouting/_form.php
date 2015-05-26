<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Accouting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accouting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_create')->textInput(['class' => 'form-control date_system']) ?>

    <?= $form->field($model, 'what_month')->dropDownList($month) ?>

    <?= $form->field($model, 'comment')->textarea(['maxlength' => 500]) ?>

    <?= $form->field($model, 'value')->textInput(['class' => 'form-control money']) ?>

    <?= $form->field($model, 'student_id')->hiddenInput(['value' => $student->id])->label('')?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
