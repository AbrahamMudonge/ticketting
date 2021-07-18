<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Salesticket;
use app\common\Functions;
use app\models\Technicalticket;
use app\models\Createticket;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WeekReportsController
 *
 * @author NASHON
 */
class WeekReportsController extends Controller {

    public function actionSendSalesTickets() {
        $models = Salesticket::find()->where("YEARWEEK(`dateCreated`, 1) = YEARWEEK(CURDATE(), 1)")->all();
        $userSalesTicket = [];
        foreach ($models as $model) {
            $arr = [];
            if (isset($userSalesTicket[$model->id])) {
                $arr = $userSalesTicket[$model->id];
            }
            array_push($arr, $model);
            $userSalesTicket[$model->id] = $arr;
        }

        foreach ($userSalesTicket as $arr) {
            $table = '<table  bgcolor="" border="3" cellspacing="15" cellpadding="15">';
            $table .= "<thead>";
            $table .= "<tr>";
            $table .= "<th>Date created</th>";
            $table .= "<th>UserName</th>";
            $table .= "<th>Source  Title</th>";
            $table .= "<th>Client  Name</th>";
            $table .= "<th>Full  Details</th>";
            $table .= "<th>Quantity</th>";
            $table .= "<th>Cost</th>";
            $table .= "</tr>";
            $table .= "</thead>";
            $table .= "<tbody>";
            foreach ($arr as $model) {
                $table .= "<tr>";
                $table .= "<td>" . date('d/m/y', strtotime($model->dateCreated)) . "</td>";
                $table .= "<td>" . $model->user->username . "</td>";
                $table .= "<td>" . $model->source->sourceTitle . "</td>";
                $table .= "<td>" . $model->client->ClientName . "</td>";
                $table .= "<td>" . $model->FullDetails . "</td>";
                $table .= "<td>" . $model->quantity . "</td>";
                $table .= "<td>" . $model->cost . "</td>";
                $table .= "</tr>";
            }
            $table .= "<tbody>";
            $table .= "</table>";
            $message = [
                "subject" => "Sales Ticket",
                "from" => 'mackphilticketing@gmail.com',
                "to" => $model->user->email,
                "cc" => 'mackphilticketing@gmail.com',
                "htmlBody" => $table
            ];
            Functions::sendEmail($message);
        }
    }

    public function actionSendTechnicalTickets() {
        $models = Technicalticket::find()->where("YEARWEEK(`dateCreated`, 1) = YEARWEEK(CURDATE(), 1)")->orderBy("dateCreated")->all();
        $userTechnicalTicket = [];
        foreach ($models as $model) {
            $arr = [];
            if (isset($userTechnicalTicket[$model->id])) {
                $arr = $userTechnicalTicket[$model->id];
            }
            array_push($arr, $model);
            $userTechnicalTicket[Functions::getDay($model->dateCreated)][$model->id] = $arr;
        }
        print_r($models);
print_r($userTechnicalTicket); exit;
        foreach($userTechnicalTicket as $dailyKey => $dailyValue){
            $tables = '';
            foreach ($dailyValue as $arr) {
                $table = '<div>';
                $table .= '<h1>Tickets for $dailyKey </h1>';
                $table .= '<table bgcolor="" border="3" cellspacing="15" cellpadding="15">';
                $table .= "<thead>";
                $table .= "<tr>";
                $table .= "<th>UserName</th>";
                $table .= "<th>Source  Title</th>";
                $table .= "<th>Client  Name</th>";
                $table .= "<th>Full  Details</th>";
                $table .= "<th>Quantity</th>";
                $table .= "<th>Cost</th>";
                $table .= "</tr>";
                $table .= "</thead>";
                $table .= "<tbody>";
                foreach ($arr as $model) {
                    $table .= "<tr>";
                    $table .= "<td>" . $model->user->username . "</td>";
                    $table .= "<td>" . $model->source->sourceTitle . "</td>";
                    $table .= "<td>" . $model->client->ClientName . "</td>";
                    $table .= "<td>" . $model->FullDetails . "</td>";
                    $table .= "<td>" . $model->quantity . "</td>";
                    $table .= "<td>" . $model->cost . "</td>";
                    $table .= "</tr>";
                }
                $table .= "<tbody>";
                $table .= "</table>";
                $table .= "</div>";
                $tables .= $table;
            }
            $message = [
                    "subject" => "Technical Ticket",
                    "from" => 'mackphilticketing@gmail.com',
                    "to" => $model->user->email,
                    "cc" => 'mackphilticketing@gmail.com',
                    "htmlBody" => $tables
                ];
                Functions::sendEmail($message);
        }
//          public function actionSendCreateTicket() {
//        $models = Createticket::find()->where("YEARWEEK(`dateCreated`, 1) = YEARWEEK(CURDATE(), 1)")->all();
//        $userCreateTicket = [];
//        foreach ($models as $model) {
//            $arr = [];
//            if (isset($userCreateTicket[$model->id])) {
//                $arr = $userTechnicalTicket[$model->id];
//            }
//            array_push($arr, $model);
//            $userTechnicalTicket[$model->id] = $arr;
//        }
//
//        foreach ($userTechnicalTicket as $arr) {
//            $table = '<table bgcolor="" border="3" cellspacing="15" cellpadding="15">';
//            $table .= "<thead>";
//            $table .= "<tr>";
//            $table .= "<th>Date created</th>";
//            $table .= "<th>UserName</th>";
//            $table .= "<th>Source  Title</th>";
//            $table .= "<th>Client  Name</th>";
//            $table .= "<th>Full  Details</th>";
//            $table .= "<th>Quantity</th>";
//            $table .= "<th>Cost</th>";
//            $table .= "</tr>";
//            $table .= "</thead>";
//            $table .= "<tbody>";
//            foreach ($arr as $model) {
//                $table .= "<tr>";
//                $table .= "<td>" . date('d/m/y', strtotime($model->dateCreated)) . "</td>";
//                $table .= "<td>" . $model->user->username . "</td>";
//                $table .= "<td>" . $model->source->sourceTitle . "</td>";
//                $table .= "<td>" . $model->client->ClientName . "</td>";
//                $table .= "<td>" . $model->FullDetails . "</td>";
//                $table .= "<td>" . $model->quantity . "</td>";
//                $table .= "<td>" . $model->cost . "</td>";
//                $table .= "</tr>";
//            }
//            $table .= "<tbody>";
//            $table .= "</table>";
//            $message = [
//                "subject" => "Technical Ticket",
//                "from" => 'mackphilticketing@gmail.com',
//                "to" => $model->user->email,
//                "cc" => 'mackphilticketing@gmail.com',
//                "htmlBody" => $table
//            ];
//            Functions::sendEmail($message);
//        }
//        }

}
}