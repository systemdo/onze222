<?php

namespace app\models;
use app\models\repositories\AccoutingRepository;


use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string $name
 * @property integer $responsible_id
 * @property string $birthday
 * @property integer $grade_id
 * @property integer $schedule_id
 * @property integer $value
 * @property string $comment
 * @property string $gender
 * @property integer $payment_day
 *
 * @property Responsible $responsible
 * @property Grade $grade
 * @property Schedule $schedule
 * @property Accounting $accouting
 */
class Student extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'birthday', 'grade_id', 'schedule_id'], 'required'],
            [['responsible_id', 'payment_day'], 'integer'],
            [['birthday'], 'safe'],
            [['comment'], 'string'],
            [['value'], 'number', 'numberPattern' => '/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/'],
            [['name'], 'string', 'max' => 150],
            [['gender'], 'string', 'max' => 8]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'responsible_id' => Yii::t('app', 'Responsible'),
            'birthday' => Yii::t('app', 'Birthday'),
            'grade_id' => Yii::t('app', 'Grade'),
            'schedule_id' => Yii::t('app', 'Schedule'),
            'value' => Yii::t('app', 'Value'),
            'comment' => Yii::t('app', 'Comment'),
            'gender' => Yii::t('app', 'Gender'),
            'payment_day' => Yii::t('app', 'Payment Day'),
        ];
    }

    function genders(){
        return array('masculino' => 'masculino', 'femenino' => 'femenino');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsible()
    {
        return $this->hasOne(Responsible::className(), ['id' => 'responsible_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrade()
    {
        return $this->hasOne(Grade::className(), ['id' => 'grade_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedule()
    {
        return $this->hasOne(Schedule::className(), ['id' => 'schedule_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccouting()
    {
        return $this->hasMany(Accouting::className(), ['student_id' => 'id']);
    }

    function isStudentpayedCurrentMonth(){
        $accounting_respository = new AccoutingRepository;
        // var_dump($accounting_respository->isPaymentedThisMonth($this->id));
        if($accounting_respository->isPaymentedThisMonth($this->id))
             return true;
         else
            return false;
        return ;
    }

    function getAccountingByYear($year = null){
        $accounting_respository = new AccoutingRepository;
        if(empty($year)){
            $year = date('Y');
        } 
        
        return $accounting_respository->getHistoryPaymentByYear($this->id,$year);
    }

    function getPaymentByMonth($month = null, $year = null){
        $accounting_respository = new AccoutingRepository;
        if(empty($month)){
            $month = date('m');
        }
        if(empty($year)){
            $year = date('Y');
        }
        
        return $accounting_respository->getPaymentByMonth($this->id,$month, $year);
    }


}
