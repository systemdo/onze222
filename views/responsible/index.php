<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
    <p>
        <a href="<?php echo Url::to(['/responsible/create'])?>">
              <button type="button" class="btn btn-primary">
                  <span class="glyphicon glyphicon-plus"><?php echo Yii::t('app', 'create')?></span> 
              </button>
        </a>
    </p>
    
   <table class="table table-striped table-bordered bootstrap-datatable data_table responsive">
      <thead>
        <tr>    
          <th>#</th>
          <th><?php echo $responsible->attributeLabels()['name']?></th>
          <th><?php echo $responsible->attributeLabels()['street']?></th>
          <th><?php echo Yii::t('app', 'Accions')?></th>
        </tr>
      </thead>   
      <tbody>
    <?php 
        $x = 1;
        foreach ($models as $key => $model) {
     ?>   
        
        <tr>
          <td><?php echo $x ?></td>
          <td><?php echo $model->name ?></td>
          <td><?php echo $model->street ?></td>
          <td>
            
                 
                  <a class="btn btn-info" href="<?php echo Url::to(['responsible/view', 'id' => $model->id])?>">
                    <span class="glyphicon glyphicon-zoom-in"></span>
                    View
                  </a>

                  <a class="btn btn-success" href="<?php echo Url::to(['responsible/update', 'id' => $model->id])?>">
                   <span class="glyphicon glyphicon-cog"></span> 
                  Edit
                  </a>

                  <a  class="btn btn-danger" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0" href="<?php echo Url::to(['responsible/delete', 'id' => $model->id])?>">
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



