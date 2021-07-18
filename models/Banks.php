<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banks".
 *
 * @property int $banksID
 * @property string $bankName
 * @property string $branchName
 * @property string $address
 */
class Banks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bankName', 'branchName', 'address'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'banksID' => 'Banks ID',
            'bankName' => 'Bank Name',
            'branchName' => 'Branch Name',
            'address' => 'Address',
        ];
    }
}
