<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $clientID
 * @property string $ClientName
 * @property string $Email
 * @property int $phone
 * @property string $address
 *
 * @property Clientcontact[] $clientcontacts
 * @property Clienttypes[] $clienttypes
 * @property Procurement[] $procurements
 * @property Salesticket[] $salestickets
 * @property Technicalticket[] $technicaltickets
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone'], 'integer'],
            [['ClientName', 'Email', 'address'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'clientID' => 'Client ID',
            'ClientName' => 'Client Name',
            'Email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientcontacts()
    {
        return $this->hasMany(Clientcontact::className(), ['clientID' => 'clientID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienttypes()
    {
        return $this->hasMany(Clienttypes::className(), ['clientID' => 'clientID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcurements()
    {
        return $this->hasMany(Procurement::className(), ['clientID' => 'clientID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalestickets()
    {
        return $this->hasMany(Salesticket::className(), ['clientID' => 'clientID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTechnicaltickets()
    {
        return $this->hasMany(Technicalticket::className(), ['clientID' => 'clientID']);
    }
}
