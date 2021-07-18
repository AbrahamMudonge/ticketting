<?php
namespace app\common;

use yii\swiftmailer\Mailer;
use yii\swiftmailer\Message;

/**
 * Description of Functions
 *
 * @author NASHON
 */
class Functions {
    //put your code here
    public static function sendEmail($message){
        try {
            $mailer = \Yii::$app->mailer;
            $swiftMsseage = new Message($message);
            $mailer->send($swiftMsseage);
        } catch(Exception $e){
            var_dump($e->getMessage());
        }
    }
    
    public static function isThisWeek($date)
    {
        return date('W Y', $date) == date('W Y', time());
    }

    public static function getDay($date) {
        return date('Y-m-d', $date);
    }

}
