<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="col-lg-12">
    <div class="well bs-component">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo Yii::t('app', 'Birth Day')?></h3>
        </div>
        <div class="panel-body">
            <?php 

                if($birth_day_today){
                  foreach ($birth_day_today as $key => $student) {
            ?>
            <div class="col-lg-3">
              <div class="well bs-component">
                <div class="panel panel-warning">
                  <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $student['name']?></h3>
                  </div>
                  <div class="panel-body">

                      
                  </div>

                  </div>
                </div>
          </div>

            <?php 
              }
              }else{?>
                <?php echo Yii::t('app', 'No student found for Birth Day')?>
            <?php }?>
        </div>

        </div>
      </div>
</div>

