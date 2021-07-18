<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "suppliertypes".
 *
 * @property int $suppliertypesID
 * @property int $supplierID
 * @property string $supplierTitlle
 *
 * @property Suppliers $supplier
 */
class Suppliertypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'suppliertypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['supplierID', 'supplierTitlle'], 'required'],
            [['supplierID'], 'integer'],
            [['supplierTitlle'], 'string', 'max' => 100],
            [['supplierID'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::className(), 'targetAttribute' => ['supplierID' => 'supplierID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'suppliertypesID' => 'Suppliertypes ID',
            'supplierID' => 'Supplier ID',
            'supplierTitlle' => 'Supplier Titlle',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Suppliers::className(), ['supplierID' => 'supplierID']);
    }
}
