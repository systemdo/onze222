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
              <h3 class="panel-title"><?php echo $model->attributeLabels()['cpf']?></h3>
            </div>
            <div class="panel-body">
              <?php echo $model->cpf?>
            </div>
          </div>

          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $model->attributeLabels()['zipcode']?></h3>
            </div>
            <div class="panel-body">
              <?php echo $model->zipcode;?>
            </div>
          </div>

          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $model->attributeLabels()['street']?></h3>
            </div>
            <div class="panel-body">
             <?php echo $model->street?>
            </div>
          </div>
        <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $model->attributeLabels()['number']?></h3>
            </div>
            <div class="panel-body">
             <?php echo $model->number?>
            </div>
          </div>

          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $model->attributeLabels()['complement']?></h3>
            </div>
            <div class="panel-body">
             <?php echo $model->complement?>
            </div>
          </div>
          
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $model->attributeLabels()['borough']?></h3>
            </div>
            <div class="panel-body">
             <?php echo $model->borough?>
            </div>
          </div>

          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $model->attributeLabels()['city']?></h3>
            </div>
            <div class="panel-body">
             <?php echo $model->city?>
            </div>
          </div>

        </div>

        </div>
      </div>
</div>

