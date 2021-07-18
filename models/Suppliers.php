<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "suppliers".
 *
 * @property int $supplierID
 * @property string $supplierName
 * @property string $supplierAddress
 * @property string $product
 *
 * @property Supplierscontact[] $supplierscontacts
 * @property Suppliertypes[] $suppliertypes
 */
class Suppliers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'suppliers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['supplierName', 'supplierAddress', 'product'], 'required'],
            [['supplierName', 'supplierAddress', 'product'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'supplierID' => 'Supplier ID',
            'supplierName' => 'Supplier Name',
            'supplierAddress' => 'Supplier Address',
            'product' => 'Product',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplierscontacts()
    {
        return $this->hasMany(Supplierscontact::className(), ['supplierID' => 'supplierID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuppliertypes()
    {
        return $this->hasMany(Suppliertypes::className(), ['supplierID' => 'supplierID']);
    }
}
