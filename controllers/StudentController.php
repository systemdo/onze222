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


/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?'],
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
        $models = StudentRepository::find()->all();
        return $this->render('index', [
            'models' =>$models,
            'student' => new Student(),

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
       

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $model->birthday = date('Y-m-d',strtotime($model->birthday));
                $model->save();
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
}
