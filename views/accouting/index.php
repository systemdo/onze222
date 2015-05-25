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
          <th><?php //echo $student->attributeLabels()['grade_id']?></th>
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
          <td><?php //echo $model->grade->name ?></td>
          <td>
                  <a href="<?php echo Url::to(['student/view', 'id' => $student->id])?>">
                    <button type="button" class="btn btn-info">
                        <span class="glyphicon glyphicon-zoom-in"></span>
                        View
                     </button>
                  </a>

                  <a class="btn btn-success" href="<?php echo Url::to(['student/update', 'id' => $student->id])?>">
                   <span class="glyphicon glyphicon-cog"></span> 
                  Edit
                  </a>

                  <a  class="btn btn-danger" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0" href="<?php echo Url::to(['student/delete', 'id' => $student->id])?>">
                  <span class="glyphicon glyphicon-remove"></span> 
                  Delete
                  </a>
         </td>
        </tr>
    <?php    
        $x++;
    }
    ?>
    </tbody>
    </table>

