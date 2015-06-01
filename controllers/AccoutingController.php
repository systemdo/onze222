<?php

namespace app\controllers;

use Yii;
use app\models\Accouting;
use app\models\Student;
use app\models\repositories\AccoutingRepository;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccoutingController implements the CRUD actions for Accouting model.
 */
class AccoutingController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Accouting models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $Accouting = new AccoutingRepository();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $students = Student::find()->All();
        $model = Accouting::find()->All();
        return $this->render('index', [
            'students' => $students,
        ]);
    }

    /**
     * Displays a single Accouting model.
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
     * Creates a new Accouting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Accouting();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Creates a new Accouting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionPayment($student, $month = false)
    {
        $model = new Accouting();
        $student = Student::findOne($student);
        $month = ($month)? $month : (int)date("m");
        // $accouting = new AccoutingRepository();
        $model->date_create = date("d-m-Y");
        $model->what_month = $month;
        $model->value = $student->value;
        // echo'<pre>';
        // var_dump($list =$accouting->isStudentPaymentedThisMonth($student->id));die();
        // var_dump($month);die();
        $months = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");
        // $model->setStudent($student)    ;
        if ($model->load(Yii::$app->request->post())) {
            $model->student_id = $student->id;
            $model->date_create = date('Y-m-d',strtotime($model->date_create));
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('_form', [
                'model' => $model,
                'student' => $student,
                'months' => $months,
                'month' => $month,
            ]);
        }
    }
    public function actionPayments($student)
    {
        $model = new Accouting();
        $student = Student::findOne($student);
        // $accouting = $student->getAccountingByYear();
        // $model->date_create = date("d-m-Y");
        // $model->what_month = date("m");
        // $model->value = $student->value;
        // echo'<pre>';
        // var_dump($list =$accouting->isStudentPaymentedThisMonth($student->id));die();

        $month = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");
        // $model->setStudent($student)    ;
        if ($model->load(Yii::$app->request->post())) {
            
        } else {
            return $this->render('payments', [
                'model' => $model,
                // 'accouting' => $accouting,
                'student' => $student,
                'month' => $month,
            ]);
        }
    }
    public function actionHistory()
    {
        $model = new Accouting();
        $repository = new AccoutingRepository();
        $students = Student::find()->orderBy('name')->all();
        //var_dump($student);die();

        $months = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");

        
        if ($model->load(Yii::$app->request->post())) {
            
        } else {
            return $this->render('history', [
                'model' => $model,
                'students' => $students,
                'months' => $months,
            ]);
        }
    }

    public function actionExcel($year)
    {
        $model = new Accouting();
        $repository = new AccoutingRepository();
        $students = Student::find()->orderBy('name')->all();

        $months = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");

        $objPHPExcel = new \PHPExcel();
        $sheet=0;
        $columns = $objPHPExcel->getActiveSheet();
            
        $objPHPExcel->setActiveSheetIndex($sheet);
 
        foreach (range('A', 'M') as $key => $value) {
            if($key + 1 < 14){
                 // var_dump($key."=".$value); 
                 // var_dump($key+1); 
                // $columns->getColumnDimension($value.$key+1)->setWidth(10);
             }
        }
            die();
        $objPHPExcel->getActiveSheet()->setTitle('Accounting')
               
         ->setCellValue('A1', 'Student');
        
        foreach (range('A', 'O') as $key => $value) {
          if($key + 1 < 12)
                var_dump($key."=".$value); die();
                // $objPHPExcel->getActiveSheet()->setCellValue($value.$key+1, $month[$key+1]);
        }
         $objPHPExcel->getActiveSheet()->setCellValue('M1', 'value');
         $row = 2;
         foreach ($students as $key => $student){  
            //var_dump($object);die();
                    $objPHPExcel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                    $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$student->name);
                    foreach (range('A', 'M') as $key => $value) {
                        $objPHPExcel->getActiveSheet()->setCellValue($value.$row,$student->getPaymentByMonth($key,$year)); 
                    }    
                    $row++ ;
            }
           // $objPHPExcel->getActiveSheet()->getStyle()->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);//ALINEAR A LA DERECHA
            header('Content-Type: application/vnd.ms-excel');
            $filename = "Report_Onze222".date("d-m-Y-His").".xls";
            header('Content-Disposition: attachment;filename='.$filename .' ');
            header('Cache-Control: max-age=0');
           
            $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            //$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Txt');
           
            $objWriter->save('php://output');       
           
       
    }

    /**
     * Updates an existing Accouting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('_form', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Accouting model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Accouting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Accouting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Accouting::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
