<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userpermissions".
 *
 * @property string $userpermissionsID
 * @property string $usertypeID
 * @property string $permissions
 */
class Userpermissions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userpermissions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userpermissionsID'], 'required'],
            [['userpermissionsID', 'usertypeID', 'permissions'], 'string', 'max' => 100],
            [['userpermissionsID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userpermissionsID' => 'Userpermissions ID',
            'usertypeID' => 'Usertype ID',
            'permissions' => 'Permissions',
        ];
    }
}
