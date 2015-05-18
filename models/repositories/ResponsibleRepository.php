<?php

namespace app\models\repositories;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Responsible;

/**
 * ResponsibleRepository represents the model behind the search form about `app\models\Responsible`.
 */
class ResponsibleRepository extends Responsible
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'zipcode'], 'integer'],
            [['name', 'cpf', 'street', 'number', 'complement', 'borough', 'city', 'country'], 'safe'],
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
        $query = Responsible::find();

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
            'zipcode' => $this->zipcode,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'cpf', $this->cpf])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'complement', $this->complement])
            ->andFilterWhere(['like', 'borough', $this->borough])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'country', $this->country]);

        return $dataProvider;
    }
}
