<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;    
/* @var $this yii\web\View */
/* @var $searchModel app\models\repositories\AccoutingRepository */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="col-lg-12">
    <div class="well bs-component">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $student->name?></h3>
        </div>
        <div class="panel-body">
              
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo date('Y')?></h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-bordered bootstrap-datatable responsive">
              <?php 
                //echo '<pre>';
                // var_dump($student->getPaymentByMonth());
                  foreach ($month as $key => $ac) {
                     $accouting = $student->getPaymentByMonth($key);
              ?>
                  <tr>
                    <td><?php echo $ac?></td>
                    <td><?php 
                            if($accouting)
                                echo $accouting['value'];
                            else
                              echo  "00.00";
                        ?></td>
                    <td>
                        <p>
                        <?php 
                            if($accouting){
                        ?>      
                          <a class="btn btn-warning" href="<?php echo Url::to(['accouting/view', 'id' => $accouting['id']])?>">
                              <span class="glyphicon glyphicon-zoom-in"></span>
                              See Details
                          </a>
                        <?php }else{ ?>

                          <a class="btn btn-primary" href="<?php echo Url::to(['accouting/payment', 'student' => $student->id, 'month'=> $key])?>">
                              <span class="glyphicon glyphicon-zoom-in"></span>
                              To pay
                          </a>

                        <?php } ?>  
                        </p>
                    </td>  
                  </tr>
              <?php    
              }
              ?>
              </table>
            </div>
          </div>
        </div>

        </div>
      </div>
</div>

