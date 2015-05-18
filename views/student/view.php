<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="col-lg-12">
    <div class="well bs-component">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $model->name?></h3>
        </div>
        <div class="panel-body">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $model->attributeLabels()['birthday']?></h3>
            </div>
            <div class="panel-body">
              <?php echo $model->birthday?>
            </div>
          </div>

          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $model->attributeLabels()['responsible_id']?></h3>
            </div>
            <div class="panel-body">
              <?php 
              // echo '<pre>';
              // var_dump($model->responsible);
              echo $model->responsible->name;
              ?>
              <p>
                <a class="btn btn-warning" href="<?php echo Url::to(['responsible/view', 'id' => $model->responsible->id])?>">
                    <span class="glyphicon glyphicon-zoom-in"></span>
                    View Responsible
                </a>

              </p>
            </div>
          </div>

          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $model->attributeLabels()['gender']?></h3>
            </div>
            <div class="panel-body">
             <?php echo $model->gender?>
            </div>
          </div>
        <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $model->attributeLabels()['grade_id']?></h3>
            </div>
            <div class="panel-body">
             <?php echo $model->grade->name?>
            </div>
          </div>

          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $model->attributeLabels()['comment']?></h3>
            </div>
            <div class="panel-body">
             <?php echo $model->comment?>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $model->attributeLabels()['payment_day']?></h3>
            </div>
            <div class="panel-body">
             <?php echo $model->payment_day?>
            </div>
          </div>

        </div>

        </div>
      </div>
</div>
