<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\repositories\AccoutingRepository */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Accoutings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accouting-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Accouting'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <pre>
    <?php //var_dump($students)
    	foreach ($students as $key => $student) {
    		var_dump($student->getAccouting());
    	}
    ?>
</div>
