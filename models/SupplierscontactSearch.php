<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Supplierscontact;

/**
 * SupplierscontactSearch represents the model behind the search form of `app\models\Supplierscontact`.
 */
class SupplierscontactSearch extends Supplierscontact
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['suppliercontactID', 'id', 'supplierID'], 'integer'],
            [['phone', 'email', 'landLine'], 'safe'],
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
        $query = Supplierscontact::find();

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
            'suppliercontactID' => $this->suppliercontactID,
            'id' => $this->id,
            'supplierID' => $this->supplierID,
        ]);

        $query->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'landLine', $this->landLine]);

        return $dataProvider;
    }
}
