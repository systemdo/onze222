<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Accouting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-lg-12">
    <div class="well bs-component">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $months[$month]?></h3>
        </div>
        <div class="panel-body">
         <div class="rows">   
            <div class="col-lg-12">
                <p>Pagamento de: <?php echo $student->name?> </p>
            </div>

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo date('M');die();?>
    <?php //$form->field($model, 'what_month')->dropDownList($month, ["options" => [ date('M')=>['selected'=>'true']]]) ?>

    <?= $form->field($model, 'value')->textInput(['class' => 'form-control money']) ?>

    <?= $form->field($model, 'comment')->textarea(['maxlength' => 500]) ?>

    <?= $form->field($model, 'date_create')->textInput(['class' => 'form-control date_system']) ?>

    <?= $form->field($model, 'student_id')->hiddenInput(['value' => $student->id])->label('')?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
</div>
</div>
