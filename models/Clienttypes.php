<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clienttypes".
 *
 * @property string $CTID
 * @property int $clientID
 * @property string $description
 *
 * @property Clientcontact[] $clientcontacts
 * @property Clients $client
 */
class Clienttypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clienttypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clientID'], 'integer'],
            [['CTID', 'description'], 'string', 'max' => 100],
            [['CTID'], 'unique'],
            [['clientID'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['clientID' => 'clientID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CTID' => 'Ctid',
            'clientID' => 'Client ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientcontacts()
    {
        return $this->hasMany(Clientcontact::className(), ['CTID' => 'clientID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['clientID' => 'clientID']);
    }
}
