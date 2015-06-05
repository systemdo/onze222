<?php

namespace app\models\repositories;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Student;

/**
 * StudentRepository represents the model behind the search form about `app\models\Student`.
 */
class StudentRepository extends Student
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'responsible_id', 'grade_id', 'schedule_id', 'value', 'payment_day'], 'integer'],
            [['name', 'birthday', 'comment', 'gender'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Student::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'responsible_id' => $this->responsible_id,
            'birthday' => $this->birthday,
            'grade_id' => $this->grade_id,
            'schedule_id' => $this->schedule_id,
            'value' => $this->value,
            'payment_day' => $this->payment_day,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'gender', $this->gender]);

        return $dataProvider;
    }
    public function getBirthDay($day = null ){
        if (empty($day))
             $day = date('Y-m-d');

        $db = Yii::$app->db;
    
        $query = "
                    Select * from student
                    Where birthday = '$day'
                ";
        $model = $db->createCommand($query);
        // var_dump($model);
        return $result = $model->queryAll();        
    } 
}
