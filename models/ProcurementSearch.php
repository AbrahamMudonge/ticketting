<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Procurement;

/**
 * ProcurementSearch represents the model behind the search form of `app\models\Procurement`.
 */
class ProcurementSearch extends Procurement
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['procurementID', 'id', 'clientID', 'cost', 'sellingPrice'], 'integer'],
            [['order'], 'safe'],
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
        $query = Procurement::find();

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
            'procurementID' => $this->procurementID,
            'id' => $this->id,
            'clientID' => $this->clientID,
            'cost' => $this->cost,
            'sellingPrice' => $this->sellingPrice,
        ]);

        $query->andFilterWhere(['like', 'order', $this->order]);

        return $dataProvider;
    }
}
