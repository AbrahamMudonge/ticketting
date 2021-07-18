<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Suppliers;

/**
 * SuppliersSearch represents the model behind the search form of `app\models\Suppliers`.
 */
class SuppliersSearch extends Suppliers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['supplierID'], 'integer'],
            [['supplierName', 'supplierAddress', 'product'], 'safe'],
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
        $query = Suppliers::find();

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
            'supplierID' => $this->supplierID,
        ]);

        $query->andFilterWhere(['like', 'supplierName', $this->supplierName])
            ->andFilterWhere(['like', 'supplierAddress', $this->supplierAddress])
            ->andFilterWhere(['like', 'product', $this->product]);

        return $dataProvider;
    }
}
