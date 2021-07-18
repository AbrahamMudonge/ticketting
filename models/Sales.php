<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales".
 *
 * @property int $salesID
 * @property int $id
 * @property int $deptID
 * @property string $item
 * @property int $quantity
 * @property int $cost
 *
 * @property Departments $dept
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'deptID', 'quantity', 'cost'], 'integer'],
            [['item'], 'string', 'max' => 100],
            [['deptID'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['deptID' => 'deptID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'salesID' => 'Sales ID',
            'id' => 'ID',
            'deptID' => 'Dept ID',
            'item' => 'Item',
            'quantity' => 'Quantity',
            'cost' => 'Cost',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDept()
    {
        return $this->hasOne(Departments::className(), ['deptID' => 'deptID']);
    }
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
