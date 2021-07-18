<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplierscontact".
 *
 * @property int $suppliercontactID
 * @property int $id
 * @property int $supplierID
 * @property string $phone
 * @property string $email
 * @property string $landLine
 *
 * @property Suppliers $supplier
 * @property User $id0
 * @property User $id1
 */
class Supplierscontact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplierscontact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'supplierID', 'phone', 'email', 'landLine'], 'required'],
            [['id', 'supplierID'], 'integer'],
            [['phone', 'email', 'landLine'], 'string', 'max' => 100],
            [['supplierID'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::className(), 'targetAttribute' => ['supplierID' => 'supplierID']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'suppliercontactID' => 'Suppliercontact ID',
            'id' => 'ID',
            'supplierID' => 'Supplier ID',
            'phone' => 'Phone',
            'email' => 'Email',
            'landLine' => 'Land Line',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Suppliers::className(), ['supplierID' => 'supplierID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
