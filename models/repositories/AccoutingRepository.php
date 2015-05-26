<?php

namespace app\models\repositories;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Accouting;

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
    public function isStudentPaymentedThisMonth($student_id){
        $query = "
                    Select value from accouting 
                    Where student_id = $student_id 
                    And what_month=date('m')
                ";
    }
}
