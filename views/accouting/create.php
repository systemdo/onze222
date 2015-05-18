<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Accouting */

$this->title = Yii::t('app', 'Create Accouting');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accoutings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accouting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'student' => $student,
        'month' => $month,
    ]) ?>

</div>
