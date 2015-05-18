<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "responsible".
 *
 * @property integer $id
 * @property string $name
 * @property string $cpf
 * @property integer $zipcode
 * @property string $street
 * @property string $number
 * @property string $complement
 * @property string $borough
 * @property string $city
 * @property string $country
 *
 * @property Student[] $students
 */
class Responsible extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'responsible';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','street', 'number', 'complement'], 'required'],
            [['zipcode'], 'string', 'max' => 11],
            [['name'], 'string', 'max' => 150],
            [['cpf'], 'string', 'max' => 14],
            [['street'], 'string', 'max' => 200],
            [['number'], 'string', 'max' => 15],
            [['complement', 'borough'], 'string', 'max' => 100],
            // [['city', 'country'], 'string', 'max' => 20]
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
            'cpf' => Yii::t('app', 'Cpf'),
            'zipcode' => Yii::t('app', 'Zipcode'),
            'street' => Yii::t('app', 'Street'),
            'number' => Yii::t('app', 'Number'),
            'complement' => Yii::t('app', 'Complement'),
            'borough' => Yii::t('app', 'Borough'),
            'city' => Yii::t('app', 'City'),
            'country' => Yii::t('app', 'Country'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['responsible_id' => 'id']);
    }
}
