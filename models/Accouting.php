<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accouting".
 *
 * @property integer $id
 * @property integer $student_id
 * @property string $date_create
 * @property integer $what_month
 * @property string $comment
 * @property string $value
 *
 * @property Student $student
 */
class Accouting extends \yii\db\ActiveRecord
{
    public $begin_date;

    public $end_date;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accouting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['what_month','date_create', 'value'], 'required'],
            [['what_month'], 'integer'],
            [['date_create'], 'safe'],
            [['value'], 'number', 'numberPattern' => '/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/'],
            [['comment'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Fiscal Number'),
            'student_id' => Yii::t('app', 'Student'),
            'date_create' => Yii::t('app', 'Payment Day'),
            'begin_date' => Yii::t('app', 'Begin Day'),
            'end_date' => Yii::t('app', 'Day Day'),
            'what_month' => Yii::t('app', 'Which Month'),
            'comment' => Yii::t('app', 'Comment'),
            'value' => Yii::t('app', 'Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }

    function isStudentpayedCurrentMonth(){
        $this->isStudentPaymentedThisMonth($this->student->id);
    }
}
