<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Userpermissions;

/**
 * UserpermissionsSearch represents the model behind the search form of `app\models\Userpermissions`.
 */
class UserpermissionsSearch extends Userpermissions
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userpermissionsID', 'usertypeID', 'permissions'], 'safe'],
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
        $query = Userpermissions::find();

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
        $query->andFilterWhere(['like', 'userpermissionsID', $this->userpermissionsID])
            ->andFilterWhere(['like', 'usertypeID', $this->usertypeID])
            ->andFilterWhere(['like', 'permissions', $this->permissions]);

        return $dataProvider;
    }
}
