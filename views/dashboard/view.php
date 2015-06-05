<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
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
<div class="col-lg-12">
    <div class="well bs-component">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $model->name?></h3>
        </div>
        <div class="panel-body">

            <table class="table table-striped table-bordered bootstrap-datatable responsive">
                    <tbody>
                    <tr>
                        <th><?php echo $model->attributeLabels()['birthday']?></th>
                        <td><?php echo date("d/m/Y",(int)$model->birthday)?></td>
                    </tr>
                    <tr>
                        <th><?php echo $model->attributeLabels()['responsible_id']?></th>
                        <td>
                          <?php echo $model->responsible->name;?>

                          <p>
                            <a class="btn btn-warning" href="<?php echo Url::to(['responsible/view', 'id' => $model->responsible->id])?>">
                                <span class="glyphicon glyphicon-zoom-in"></span>
                                View Responsible
                            </a>
                          </p>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $model->attributeLabels()['gender']?></th>
                        <td><?php echo $model->gender?></td>
                    </tr>
                    <tr>
                        <th><?php echo $model->attributeLabels()['grade_id']?></th>
                        <td><?php echo $model->grade->name?></td>
                    </tr>
                    <tr>
                        <th><?php echo $model->attributeLabels()['value']?></th>
                        <td>R$ <?php echo $model->value?></td>
                    </tr>
                    <tr>
                        <th><?php echo $model->attributeLabels()['payment_day']?></th>
                        <td><?php echo $model->payment_day?></td>
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

