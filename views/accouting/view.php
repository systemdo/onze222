<?php

use yii\helpers\Html;
use yii\helpers\Url;    
?>

<div class="col-lg-12">
    <div class="well bs-component">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $model->student->name?></h3>
        </div>
        <div class="panel-body">
              <p>
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <table class="table table-striped table-bordered bootstrap-datatable responsive">
                    <tbody>
                    <tr>
                        <th><?php echo $model->attributeLabels()['id']?></th>
                        <td><?php echo $model->id?></td>
                    </tr>
                    <tr>
                        <th><?php echo $model->attributeLabels()['value']?></th>
                        <td><?php echo $model->value?></td>
                    </tr>
                    <tr>
                        <th><?php echo $model->attributeLabels()['what_month']?></th>
                        <td><?php echo $model->what_month?></td>
                    </tr>
                    <tr>
                        <th><?php echo $model->attributeLabels()['date_create']?></th>
                        <td><?php echo $model->date_create?></td>
                    </tr>
                    <tr>
                        <th><?php echo $model->attributeLabels()['comment']?></th>
                        <td><?php echo $model->comment?></td>
                    </tr>
                    
                    </tbody>  
              </table>
        </div>

        </div>
      </div>
</div>


