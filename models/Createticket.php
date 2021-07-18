<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "createticket".
 *
 * @property int $createticketID
 * @property string $dateCreated
 * @property string $dateToday
 * @property int $id
 * @property int $sourceID
 * @property int $clientID
 * @property string $Description
 * @property int $Quantity
 * @property double $Cost
 *
 * @property User $id0
 * @property Sources $source
 * @property Clients $client
 */
class Createticket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'createticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dateToday', 'id', 'sourceID', 'clientID', 'Description'], 'required'],
            [['createticketID', 'id', 'sourceID', 'clientID', 'Quantity'], 'integer'],
            [['dateCreated', 'dateToday'], 'safe'],
            [['Cost'], 'number'],
            [['Description'], 'string', 'max' => 500],
            [['createticketID'], 'unique'],
            [['createticketID'], 'required', 'on' => 'update'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
            [['sourceID'], 'exist', 'skipOnError' => true, 'targetClass' => Sources::className(), 'targetAttribute' => ['sourceID' => 'sourceID']],
            [['clientID'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['clientID' => 'clientID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'createticketID' => 'Createticket ID',
            'dateCreated' => 'Date Created',
            'dateToday' => 'Date Today',
            'id' => 'ID',
            'sourceID' => 'Source ID',
            'clientID' => 'Client ID',
            'Description' => 'Description',
            'Quantity' => 'Quantity',
            'Cost' => 'Cost',
            'statusID' => 'Status ID',
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
    public function getSource()
    {
        return $this->hasOne(Sources::className(), ['sourceID' => 'sourceID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['clientID' => 'clientID']);
    }
    public function getStatus() {
        return $this->hasOne(Status::className(), ['statusID' => 'statusID']);
    }
}
