<?php

namespace app\models;

use Yii;
use app\models\Leavesetting;

/**
 * This is the model class for table "leaveapplication".
 *
 * @property int $leaveApplicationID
 * @property int $id
 * @property string $startDate
 * @property string $endDate
 * @property string $comment
 * @property int $statusID
 *
 * @property User $user
 * @property Status $status
 */
class Leaveapplication extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'leaveapplication';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'startDate', 'endDate', 'comment', 'statusID'], 'required'],
            [['id', 'statusID'], 'integer'],
            [['startDate', 'endDate'], 'safe'],
            [['comment'], 'string', 'max' => 100],
            [['endDate'], 'lessOrEqualToRemainingLeaveDays']
//            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
//            [['statusID'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['statusID' => 'statusID']],
        ];
    }
    
    public function lessOrEqualToRemainingLeaveDays($attribute, $params){
        $start = $this->startDate;
        $end = $this->endDate;
        
        $diff = Leaveapplication::leavesCalcullator($start, $end);
        $remaining = Leaveapplication::myRemainingDays(\Yii::$app->user->id);
        if($diff <= $remaining){
            return true;
        }
        $this->addError($attribute, 'sorry the number of days you are applying exceeds remaining days.');
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'leaveApplicationID' => 'Leave Application ID',
            'id' => 'ID',
            'startDate' => 'Start Date',
            'endDate' => 'End Date',
            'comment' => 'Comment',
            'statusID' => 'Status ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus() {
        return $this->hasOne(Status::className(), ['statusID' => 'statusID']);
    }

    public function getLeaveDays() {
       return Leaveapplication::leavesCalcullator($this->startDate,$this->endDate);
    }
    public function getRemainingDays(){
        $leaveSettings = Leavesetting::findOne(1);
        $totalLeaveDaysAwardeds=  Leaveapplication::find()->where('id=:id AND statusID=:status AND leaveApplicationID>:leaveApplicationID',[':id'=>$this->id,':status'=>2,':leaveApplicationID'=>  $this->leaveApplicationID])->all();
        $number_awarded=0;
        foreach ($totalLeaveDaysAwardeds as $totalLeaveDaysAwarded) {
         $number_awarded+=Leaveapplication::leavesCalcullator($totalLeaveDaysAwarded->startDate, $totalLeaveDaysAwarded->endDate);
        }
        return $leaveSettings->totalLeaveDays-($number_awarded+$this->getLeaveDays());
    }
    public static function leavesCalcullator($startDate,$endDate){
      $leaveSettings = Leavesetting::findOne(1);
        $endDate = strtotime($endDate);
        $number_of_saturdays = 0;
        for ($i = strtotime('Saturday', strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i)) {
            $number_of_saturdays++;
        }
        $datediff = $endDate - strtotime($startDate);

        $total_days = round($datediff / (60 * 60 * 24));
        $number_of_leavedays = ($total_days) - ($number_of_saturdays * $leaveSettings->saturday);
        return $number_of_leavedays;   
    }
    
    public static function myRemainingDays($id){
        $leaveSettings = Leavesetting::findOne(1);
        $totalLeaveDaysAwardeds=  Leaveapplication::find()->where('id=:id AND statusID=:status',[':id'=>$id,':status'=>2])->all();
        $number_awarded=0;
        foreach ($totalLeaveDaysAwardeds as $totalLeaveDaysAwarded) {
         $number_awarded+=Leaveapplication::leavesCalcullator($totalLeaveDaysAwarded->startDate, $totalLeaveDaysAwarded->endDate);
        }
        return $leaveSettings->totalLeaveDays-($number_awarded+0);
    }

}
