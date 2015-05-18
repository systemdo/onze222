<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\repositories\ResponsibleRepository */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="responsible-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'cpf') ?>

    <?= $form->field($model, 'zipcode') ?>

    <?= $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'complement') ?>

    <?php // echo $form->field($model, 'borough') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'country') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
