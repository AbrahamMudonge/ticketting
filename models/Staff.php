<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $staffID
 * @property int $id
 * @property string $FName
 * @property string $LName
 * @property string $otherName
 * @property string $Email
 * @property int $phone
 *
 * @property User $id0
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'phone'], 'integer'],
            [['FName', 'LName', 'otherName', 'Email'], 'string', 'max' => 100],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'staffID' => 'Staff ID',
            'id' => 'ID',
            'FName' => 'F Name',
            'LName' => 'L Name',
            'otherName' => 'Other Name',
            'Email' => 'Email',
            'phone' => 'Phone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
