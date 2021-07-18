<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usertypes".
 *
 * @property string $usertypeID
 * @property string $userID
 * @property string $title
 */
class Usertypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usertypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usertypeID'], 'required'],
            [['usertypeID', 'userID', 'title'], 'string', 'max' => 100],
            [['usertypeID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usertypeID' => 'Usertype ID',
            'userID' => 'User ID',
            'title' => 'Title',
        ];
    }
}
