<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clienttypes;

/**
 * ClienttypesSearch represents the model behind the search form of `app\models\Clienttypes`.
 */
class ClienttypesSearch extends Clienttypes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CTID', 'description'], 'safe'],
            [['clientID'], 'integer'],
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
        $query = Clienttypes::find();

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
            'clientID' => $this->clientID,
        ]);

        $query->andFilterWhere(['like', 'CTID', $this->CTID])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
