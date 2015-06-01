<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;    
/* @var $this yii\web\View */
/* @var $searchModel app\models\repositories\AccoutingRepository */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
  <?php /*$form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'begin_date')->textInput(['class' => 'form-control date_system']) ?>
    
    <?= $form->field($model, 'end_date')->textInput(['class' => 'form-control date_system']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); */?>
<div class="col-lg-12">
    <div class="well bs-component">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo date('Y')?></h3>
        </div>
        <div class="panel-body">


 <table class="table table-striped table-bordered bootstrap-datatable data_table responsive">
      <thead>
        <tr>
          <th>Student</th>
          <?php foreach ($months as $key => $month) { ?>
          <th><?php echo $month?></th>
          <?php 
                }
          ?>
        </tr>
      </thead>   
      <tbody>
    <?php 
        foreach ($students as $key => $student) {
     ?>
        <tr>
          <td>
              <a href="<?php echo Url::to(['student/view', 'id' => $student->id])?>">
                <?php echo $student->name ?>
              </a>  
          </td>

            <?php 
                foreach ($months as $key => $month) 
                { 
                  $value = $student->getPaymentByMonth($key)['value'];
            ?>
              <td>
                <?php 
                    if(!$value)
                      echo "00.00";
                    else
                      echo $value;
                  ?>
              </td>
            <?php
                }
            ?>
          
        </tr>
    <?php    
    }
    ?>
    </tbody>
    </table>

</div>
</div>
</div>
</div>


