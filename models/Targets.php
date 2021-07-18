<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "targets".
 *
 * @property int $targetID
 * @property int $id
 * @property int $targetDetail
 *
 * @property User $id0
 */
class Targets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'targets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'targetDetail'], 'required'],
            [['id', 'targetDetail'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'targetID' => 'Target ID',
            'id' => 'ID',
            'targetDetail' => 'Target Detail',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
