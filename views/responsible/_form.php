<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Responsible */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="responsible-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'cpf')->textInput(['class' => 'cpf form-control']) ?>

    <?= $form->field($model, 'zipcode')->textInput(['class' => 'cep form-control']) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'complement')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'borough')->textInput(['maxlength' => 100]) ?>

    <?php //$form->field($model, 'city')->textInput(['maxlength' => 20]) ?>

    <?php //$form->field($model, 'country')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
