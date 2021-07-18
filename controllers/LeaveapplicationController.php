<?php

namespace app\controllers;

use Yii;
use app\models\Leaveapplication;
use app\models\LeaveapplicationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\common\Functions;
use app\helpers\PermissionsList;
use yii\filters\AccessControl;

/**
 * LeaveapplicationController implements the CRUD actions for Leaveapplication model.
 */
class LeaveapplicationController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
             'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => [PermissionsList::VIEW_APPLY_LEAVE],
                    ], [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => [PermissionsList::APPLY_LEAVE],
                    ], [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => [PermissionsList::UPDATE_APPLY_LEAVE],
                    ],[
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => [PermissionsList::DELETE_APPLY_LEAVE],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['approve'],
                        'roles' => [PermissionsList::APPROVE_LEAVE],
                    ],
                     [
                        'allow' => true,
                        'actions' => ['approveleave'],
                        'roles' => [PermissionsList::APPROVELEAVE_BUTTON],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['disapproveleave'],
                        'roles' => [PermissionsList::DISAPPROVELEAVE_BUTTON],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Leaveapplication models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new LeaveapplicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionApproveleave($id) {
        $model = $this->findModel($id);
        if($model){
            $model->statusID = 2;
            if($model->save()){
                $message = [
                    "subject" => "Leave application",
                    "from" => 'mackphilticketing@gmail.com',
                    "to" => $model->user->email,
                    "cc" => 'mackphilticketing@gmail.com',
                    "textBody" => "hi ". $model->user->username.
                       " your leave application starting on ". date('d/m/Y',strtotime($model->startDate)).
                       " has been approved for " . $model->getLeaveDays() ." days" .
                       ". You now have " . $model->getRemainingDays() . 
                       " remaining days. Enjoy your leave."
                ];
                Functions::sendEmail($message);
            }
        }
        return $this->redirect(['approve']);
    }
    public function actionDisapproveleave($id) {
        $model = $this->findModel($id);
        if($model){
            $model->statusID = 3;
            if($model->save()){
                $message = [
                    "subject" => "Leave application",
                    "from" => 'mackphilticketing@gmail.com',
                    "to" => $model->user->email,
                    "cc" => 'mackphilticketing@gmail.com',
                    "textBody" => "hi ". $model->user->username.
                       " your leave application starting on ". date('d/m/Y',strtotime($model->startDate)).
                       " has been disapproved for " . $model->getLeaveDays() ." days" .
                       ". Sorry  for  the  inconvinience."
                ];
                Functions::sendEmail($message);
            }
        }
    return $this->redirect(['approve']);
    
            }

    /**
     * Displays a single Leaveapplication model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionApprove() {
        $searchModel = new LeaveapplicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('approve', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Leaveapplication model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Leaveapplication();
        $model->id = Yii::$app->user->id;
        if($model){
            $model->statusID = 1;
            if(\Yii::$app->request->isPost){
                $post = \Yii::$app->request->post();
                $model->setAttributes($post['Leaveapplication']);
                if($model->validate()&&$model->save(false)){
                    
                        $message = [
                            "subject" => "Leave application",
                            "from" => 'mackphilticketing@gmail.com',
                            "to" => 'mackphilticketing@gmail.com',
                            "cc" => 'mackphilticketing@gmail.com',
                             "htmlBody" => "hello sir ".",This is ". $model->user->username.
                       " requesting for  leave starting on ". date('d/m/Y',strtotime($model->startDate)).
                       "  for " . $model->getLeaveDays() ." days" .
                       ". kindly assist.  <br>"
                            . "Click here to approve <a href='http://localhost/ticketting/web/leaveapplication/approve'> Approve </a>"

                        ];
                        Functions::sendEmail($message);
                    
                    $this->redirect(\yii\helpers\Url::toRoute('/leaveapplication/index'));
                }
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Leaveapplication model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->leaveApplicationID]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Leaveapplication model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Leaveapplication model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Leaveapplication the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Leaveapplication::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
