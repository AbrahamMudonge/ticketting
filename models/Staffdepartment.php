<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staffdepartment".
 *
 * @property int $staffDeptID
 * @property int $id
 * @property int $deptID
 *
 * @property User $id0
 * @property Departments $dept
 */
class Staffdepartment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staffdepartment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'deptID'], 'required'],
            [['id', 'deptID'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
            [['deptID'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['deptID' => 'deptID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'staffDeptID' => 'Staff Dept ID',
            'id' => 'ID',
            'deptID' => 'Dept ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDept()
    {
        return $this->hasOne(Departments::className(), ['deptID' => 'deptID']);
    }
}
