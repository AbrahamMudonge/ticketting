<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Targets;

/**
 * TargetsSearch represents the model behind the search form of `app\models\Targets`.
 */
class TargetsSearch extends Targets
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['targetID', 'id', 'targetDetail'], 'integer'],
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
        $query = Targets::find();

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
            'targetID' => $this->targetID,
            'id' => $this->id,
            'targetDetail' => $this->targetDetail,
        ]);

        return $dataProvider;
    }
}
