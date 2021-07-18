<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientcontact".
 *
 * @property int $CCID
 * @property int $id
 * @property int $clientID
 * @property int $CTID
 *
 * @property Clients $client
 * @property Clienttypes $cT
 * @property User $id0
 */
class Clientcontact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientcontact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'clientID', 'CTID'], 'integer'],
            [['clientID'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['clientID' => 'clientID']],
            [['CTID'], 'exist', 'skipOnError' => true, 'targetClass' => Clienttypes::className(), 'targetAttribute' => ['CTID' => 'clientID']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CCID' => 'Ccid',
            'id' => 'ID',
            'clientID' => 'Client ID',
            'CTID' => 'Ctid',
        ];
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
    public function getCT()
    {
        return $this->hasOne(Clienttypes::className(), ['clientID' => 'CTID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
