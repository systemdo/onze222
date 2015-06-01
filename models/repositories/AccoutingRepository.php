<?php

namespace app\models\repositories;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Accouting;
use yii\db\Query;
use yii\db\Connection;


/**
 * AccoutingRepository represents the model behind the search form about `app\models\Accouting`.
 */
class AccoutingRepository extends Accouting
{
   
    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['id', 'student_id', 'what_month'], 'integer'],
            [['date_create', 'comment'], 'safe'],
            [['value'], 'number'],
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
        $query = Accouting::find();

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
            'student_id' => $this->student_id,
            'date_create' => $this->date_create,
            'what_month' => $this->what_month,
            'value' => $this->value,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }

    public function accoutingByStudent($student_id){
        // $query = "Select * from where student_id = "
    }
    public function isPaymentedThisMonth($student_id){
        $db = Yii::$app->db;
        $query = "
                    Select value from accouting 
                    Where student_id = $student_id
                    And what_month=MONTH(CURRENT_DATE())
                ";

        $model = $db->createCommand($query);
        // var_dump($model);
        return $result = $model->queryOne();
        
    }
    public function getPaymentByMonth($student_id,$month){
        $db = Yii::$app->db;
        $query = "
                    Select * from accouting a
                    Inner Join student s
                    on a.student_id=s.id
                    Where a.student_id = $student_id
                    And what_month = $month
                    And YEAR(a.date_create) = YEAR(CURRENT_DATE())
                    group by MONTH($month)
                    Order BY MONTH($month)   
                ";
        $model = $db->createCommand($query);
        // var_dump($model);
        return $result = $model->queryOne();
        
    }

    public function getHistoryPaymentStudentByYear($student_id,$year){
        $db = Yii::$app->db;
        $query = "
                    Select * from accouting a
                    Inner Join student s
                    on a.student_id=s.id
                    Where a.student_id = $student_id
                    And YEAR(a.date_create) = $year
                    group by MONTH(a.what_month)
                    Order BY MONTH(a.what_month)   
                ";
        $model = $db->createCommand($query);
        // var_dump($model);
        return $result = $model->queryAll();        

    }
    public function getAllHistoryPaymentByYear($year = null){
        if (empty($year))
            $year = date('Y');

        $db = Yii::$app->db;
    
        $query = "
                    Select * from accouting a
                    Inner Join student s
                    on a.student_id=s.id
                    And YEAR(a.date_create) = $year
                    group by YEAR(a.date_create)
                    #Order BY MONTH(a.what_month)   
                ";
        $model = $db->createCommand($query);
        // var_dump($model);
        return $result = $model->queryAll();        

    } 
}
