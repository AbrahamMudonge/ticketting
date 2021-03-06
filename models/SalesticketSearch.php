<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Salesticket;

/**
 * SalesticketSearch represents the model behind the search form of `app\models\Salesticket`.
 */
class SalesticketSearch extends Salesticket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['salesticketID', 'id', 'sourceID', 'clientID', 'quantity', 'cost'], 'integer'],
            [['dateCreated', 'FullDetails'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Salesticket::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'salesticketID' => $this->salesticketID,
            'dateCreated' => $this->dateCreated,
            'id' => $this->id,
            'sourceID' => $this->sourceID,
            'clientID' => $this->clientID,
            'quantity' => $this->quantity,
            'cost' => $this->cost,
        ]);

        $query->andFilterWhere(['like', 'FullDetails', $this->FullDetails]);

        return $dataProvider;
    }
}
