<?php
namespace app\components;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppBootstrap
 *
 * @author NASHON
 */
class AppBootstrap implements yii\base\BootstrapInterface{


   public function bootstrap($app){
       throw "dfxftdfcty";


       $app->user->on(dektrium\user\controllers\SecurityController::EVENT_BEFORE_LOGIN,['app\events\AfterLoginEvent','handleNewUser']);

   }

}
