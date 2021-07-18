<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property int $deptID
 * @property string $departmentName
 * @property string $desscription
 *
 * @property Staffdepartment[] $staffdepartments
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['departmentName', 'desscription'], 'required'],
            [['departmentName', 'desscription'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'deptID' => 'Dept ID',
            'departmentName' => 'Department Name',
            'desscription' => 'Desscription',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaffdepartments()
    {
        return $this->hasMany(Staffdepartment::className(), ['deptID' => 'deptID']);
    }
}
