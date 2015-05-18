<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php
    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'responsible_id')->dropDownList(ArrayHelper::map($responsible::find()->all(), 'id', 'name' )) ?>

    <?= $form->field($model, 'birthday')->textInput(["class"=>"date_system form-control"]) ?>

    <?= $form->field($model, 'grade_id')->dropDownList(ArrayHelper::map($grade::find()->all(), 'id', 'name' )) ?>

    <?= $form->field($model, 'schedule_id')->dropDownList(ArrayHelper::map($schedule::find()->all(), 'id', 'schedule' )) ?>

    <?= $form->field($model, 'value')->textInput(["class" => "money form-control"]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'gender')->dropDownList($model->genders()) ?>

    <?= $form->field($model, 'payment_day')->textInput(['class' => 'days form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
