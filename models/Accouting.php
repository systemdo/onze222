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
            'id' => Yii::t('app', 'ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'date_create' => Yii::t('app', 'Date Create'),
            'what_month' => Yii::t('app', 'What Month'),
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
}
