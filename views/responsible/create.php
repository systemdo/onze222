<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Responsible */

$this->title = Yii::t('app', 'Create Responsible');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Responsibles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsible-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
