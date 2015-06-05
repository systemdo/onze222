<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
$days = array(1 => 1);
foreach (range(2, 30) as $key => $value) {
            $days[$value] = $value;
         }
?>
<p>
    <?= Html::a(!$model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'List'), !$model->isNewRecord ? ['create']:['index'], ['class' => !$model->isNewRecord ? 'btn btn-success' : 'btn btn-info']) ?>
    <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ]) ?>
</p>

<div class="col-lg-12">
    <div class="well bs-component">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $model->name?$model->name: "New Student"?></h3>
        </div>
        <div class="panel-body">

    <?php
    $form = ActiveForm::begin(); ?>
    <div class="col-lg-7">
        <div class="row">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 150]) ?>
        </div>
    </div>
     <div class="col-lg-5">
        <div class="row">
             <?= $form->field($model, 'birthday')->textInput(["class"=>"date_system form-control"]) ?>
         </div>
    </div>
   <div class="col-lg-6">
        <div class="row">
             <?= $form->field($model, 'responsible_id')->dropDownList(ArrayHelper::map($responsible::find()->all(), 'id', 'name' )) ?>
         </div>
    </div>
   
   <div class="col-lg-6">
        <div class="row">
            <?= $form->field($model, 'grade_id')->dropDownList(ArrayHelper::map($grade::find()->all(), 'id', 'name' )) ?>
        </div>
    </div>
   
    <div class="col-lg-6">
        <div class="row">
            <?= $form->field($model, 'schedule_id')->dropDownList(ArrayHelper::map($schedule::find()->all(), 'id', 'schedule' )) ?>
         </div>
    </div>
   

    <div class="col-lg-6">
        <div class="row">
            <?= $form->field($model, 'value')->textInput(["class" => "money form-control"]) ?>
        </div>
    </div>
   
<div class="col-lg-6">
        <div class="row">
            <?= $form->field($model, 'gender')->dropDownList($model->genders()) ?>
        </div>
</div>

    <div class="col-lg-6">
        <div class="row">
             <?= $form->field($model, 'payment_day')->dropDownList($days) ?>
        </div>
    </div>
    
    <div class="col-lg-6 comment" style="margin-left:25%">
        <div class="row">
             <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="col-lg-12 submit_button" style="margin-left:45%">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>

        </div>
      </div>
</div>
