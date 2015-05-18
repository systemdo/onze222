<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property integer $id
 * @property string $schedule
 *
 * @property Student[] $students
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['schedule'], 'required'],
            [['schedule'], 'string', 'max' => 70]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'schedule' => Yii::t('app', 'Schedule'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['schedule_id' => 'id']);
    }
}
