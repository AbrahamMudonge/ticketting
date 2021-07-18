<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Staff;

/**
 * StaffSearch represents the model behind the search form of `app\models\Staff`.
 */
class StaffSearch extends Staff
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staffID', 'id', 'phone'], 'integer'],
            [['FName', 'LName', 'otherName', 'Email'], 'safe'],
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
        $query = Staff::find();

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
            'staffID' => $this->staffID,
            'id' => $this->id,
            'phone' => $this->phone,
        ]);

        $query->andFilterWhere(['like', 'FName', $this->FName])
            ->andFilterWhere(['like', 'LName', $this->LName])
            ->andFilterWhere(['like', 'otherName', $this->otherName])
            ->andFilterWhere(['like', 'Email', $this->Email]);

        return $dataProvider;
    }
}
