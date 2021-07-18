<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "procurement".
 *
 * @property int $procurementID
 * @property int $id
 * @property int $clientID
 * @property string $order
 * @property int $cost
 * @property int $sellingPrice
 *
 * @property User $id0
 * @property Clients $client
 */
class Procurement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'procurement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'clientID', 'order', 'cost', 'sellingPrice'], 'required'],
            [['id', 'clientID', 'cost', 'sellingPrice'], 'integer'],
            [['order'], 'string', 'max' => 100],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
            [['clientID'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['clientID' => 'clientID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'procurementID' => 'Procurement ID',
            'id' => 'ID',
            'clientID' => 'Client ID',
            'order' => 'Order',
            'cost' => 'Cost',
            'sellingPrice' => 'Selling Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['clientID' => 'clientID']);
    }
    public function getMargins()
    {
        return   $this->sellingPrice-$this->cost;
    }
}
