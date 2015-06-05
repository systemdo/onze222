<?php

namespace app\controllers;

use Yii;
use app\models\Student;
use app\models\Schedule;
use app\models\Grade;
use app\models\responsible;
use app\models\repositories\StudentRepository;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


class DashboardController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {

        $stu_repo = new StudentRepository();
        $birth_day_today = $stu_repo->getBirthDay();
        return $this->render('index', [
            // 'models' =>$models,
            'birth_day_today' => $birth_day_today,

        ]);
    }

    /**
     * Displays a single Student model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Student();
        $schedule = new Schedule();
        $grade = new Grade();
        $responsible = new Responsible();

        // date_format($date, 'Y-m-d');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $model->value = $this->formatMoney($model->value);
                $model->birthday = date('Y-m-d',strtotime($model->birthday));
                $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'schedule' => $schedule,
                'grade' => $grade,
                'responsible' => $responsible,
            ]);
        }
    }

    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $responsible = new Responsible();
        $schedule = new Schedule();
        $grade = new Grade();
        $model->birthday = date('d-m-Y',strtotime($model->birthday));        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                // echo '<pre>';
                // var_dump(Yii::$app->request->post());
                //var_dump($model->value);
                $model->value = $this->formatMoney($model->value);

                $model->birthday = date('Y-m-d',strtotime($model->birthday));
                $model->save();
                 // var_dump($model->value); //die();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('_form', [
                'model' => $model,
                'schedule' => $schedule,
                'grade' => $grade,
                'responsible' => $responsible,
            ]);
        }
    }

    /**
     * Deletes an existing Student model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        // var_dump($this->findModel($id));die();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function formatMoney($money){

        $money = str_replace('.','',$money);

        $money = str_replace(',','.',$money);

        return $money;
    }
}
