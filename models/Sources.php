<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sources".
 *
 * @property int $sourceID
 * @property string $sourceTitle
 *
 * @property Salesticket[] $salestickets
 * @property Technicalticket[] $technicaltickets
 */
class Sources extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sources';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sourceTitle'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sourceID' => 'Source ID',
            'sourceTitle' => 'Source Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalestickets()
    {
        return $this->hasMany(Salesticket::className(), ['sourceID' => 'sourceID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTechnicaltickets()
    {
        return $this->hasMany(Technicalticket::className(), ['sourceID' => 'sourceID']);
    }
}
