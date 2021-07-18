<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tickettypes".
 *
 * @property int $tickettypesID
 * @property string $description
 * @property int $deptID
 *
 * @property Salesticket[] $salestickets
 * @property Technicalticket[] $technicaltickets
 * @property Departments $dept
 */
class Tickettypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickettypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'deptID'], 'required'],
            [['deptID'], 'integer'],
            [['description'], 'string', 'max' => 100],
            [['deptID'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['deptID' => 'deptID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tickettypesID' => 'Tickettypes ID',
            'description' => 'Description',
            'deptID' => 'Dept ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalestickets()
    {
        return $this->hasMany(Salesticket::className(), ['tickettypesID' => 'tickettypesID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTechnicaltickets()
    {
        return $this->hasMany(Technicalticket::className(), ['tickettypesID' => 'tickettypesID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDept()
    {
        return $this->hasOne(Departments::className(), ['deptID' => 'deptID']);
    }
}
