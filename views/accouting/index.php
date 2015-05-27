<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;    
/* @var $this yii\web\View */
/* @var $searchModel app\models\repositories\AccoutingRepository */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
 <table class="table table-striped table-bordered bootstrap-datatable data_table responsive">
      <thead>
        <tr>
          <th>#</th>
          <th><?php //e cho $students->attributeLabels()['name']?></th>
          <th>Status</th>
          <th><?php echo Yii::t('app', 'Accions')?></th>
        </tr>
      </thead>   
      <tbody>
    <?php 
        $x = 1;
        foreach ($students as $key => $student) {
     ?>
        <tr>
          <td><?php echo $x ?></td>
          <td><?php echo $student->name ?></td>
          <td>
            <?php 
                // var_dump($student->isStudentpayedCurrentMonth());
                if($student->isStudentpayedCurrentMonth()){
            ?>
                    <span class="label-success label">Payed</span>
            <?php 
                }else{
            ?>
                <span class="label-primary label">To pay</span>
            <?php
                }
            ?>

          </td>
          <td>
                  <a href="<?php echo Url::to(['accouting/payment', 'student' => $student->id])?>">
                    <button type="button" class="btn btn-info">
                        <!-- <span class="glyphicon glyphicon-zoom-in"></span> -->
                        To Pay
                     </button>
                  </a>

                  <a href="<?php echo Url::to(['student/update', 'id' => $student->id])?>">
                  <button type="button" class="btn btn-warning">
                   <!-- <span class="glyphicon glyphicon-cog"></span>  -->
                  Payment
                  </button>

                  </a>
         </td>
        </tr>
    <?php    
        $x++;
    }
    ?>
    </tbody>
    </table>

