<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Leaveapplication;

/**
 * LeaveapplicationSearch represents the model behind the search form of `app\models\Leaveapplication`.
 */
class LeaveapplicationSearch extends Leaveapplication
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['leaveApplicationID', 'id', 'statusID'], 'integer'],
            [['startDate', 'endDate', 'comment'], 'safe'],
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
        $query = Leaveapplication::find();

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
            'leaveApplicationID' => $this->leaveApplicationID,
            'id' => \Yii::$app->user->id,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'statusID' => $this->statusID,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
