<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salesticket".
 *
 * @property string $dateCreated
 * @property string $dateToday
 * @property int $salesticketID
 * @property int $id
 * @property int $sourceID
 * @property int $clientID
 * @property string $FullDetails
 * @property int $quantity
 * @property int $cost
 *
 * @property User $id0
 * @property Clients $client
 * @property Sources $source
 */
class Salesticket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salesticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dateCreated', 'dateToday'], 'safe'],
            [['id', 'sourceID', 'clientID', 'FullDetails'], 'required'],
            [['id', 'sourceID', 'clientID', 'quantity', 'cost'], 'integer'],
            [['FullDetails'], 'string', 'max' => 500],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
            [['clientID'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['clientID' => 'clientID']],
            [['sourceID'], 'exist', 'skipOnError' => true, 'targetClass' => Sources::className(), 'targetAttribute' => ['sourceID' => 'sourceID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dateCreated' => 'Date Created',
            'dateToday' => 'Date Today',
            'salesticketID' => 'Salesticket ID',
            'id' => 'ID',
            'sourceID' => 'Source ID',
            'clientID' => 'Client ID',
            'FullDetails' => 'Full Details',
            'quantity' => 'Quantity',
            'cost' => 'Cost',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(Sources::className(), ['sourceID' => 'sourceID']);
    }
}
