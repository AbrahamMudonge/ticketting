<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Createticket;

/**
 * CreateticketSearch represents the model behind the search form of `app\models\Createticket`.
 */
class CreateticketSearch extends Createticket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['createticketID', 'id', 'sourceID', 'clientID', 'Quantity'], 'integer'],
            [['dateCreated', 'dateToday', 'Description'], 'safe'],
            [['Cost'], 'number'],
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
        $query = Createticket::find();

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
            'createticketID' => $this->createticketID,
            'dateCreated' => $this->dateCreated,
            'dateToday' => $this->dateToday,
            'id' => \Yii::$app->user->id,
            'sourceID' => $this->sourceID,
            'clientID' => $this->clientID,
            'Quantity' => $this->Quantity,
            'Cost' => $this->Cost,
        ]);

        $query->andFilterWhere(['like', 'Description', $this->Description]);

        return $dataProvider;
    }
}
