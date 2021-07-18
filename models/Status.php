<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $statusID
 * @property string $title
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'statusID' => 'Status ID',
            'title' => 'Status',
        ];
    }
}
