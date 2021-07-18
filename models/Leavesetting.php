<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "leavesetting".
 *
 * @property int $leaveSettingID
 * @property int $totalLeaveDays
 * @property double $saturday
 */
class Leavesetting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leavesetting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['totalLeaveDays', 'saturday'], 'required'],
            [['totalLeaveDays'], 'integer'],
            [['saturday'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'leaveSettingID' => 'Leave Setting ID',
            'totalLeaveDays' => 'Total Leave Days',
            'saturday' => 'Saturday',
        ];
    }
}
