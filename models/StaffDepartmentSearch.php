<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StaffDepartment;

/**
 * StaffDepartmentSearch represents the model behind the search form of `app\models\StaffDepartment`.
 */
class StaffDepartmentSearch extends StaffDepartment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staffDeptID', 'id', 'deptID'], 'integer'],
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
        $query = StaffDepartment::find();

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
            'staffDeptID' => $this->staffDeptID,
            'id' => $this->id,
            'deptID' => $this->deptID,
        ]);

        return $dataProvider;
    }
}
