<?php

namespace app\controllers;

use Yii;
use app\models\Createticket;
use app\models\CreateticketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\helpers\PermissionsList;
use yii\filters\AccessControl;

/**
 * CreateticketController implements the CRUD actions for Createticket model.
 */
class CreateticketController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
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
                        'roles' => [PermissionsList::VIEW_TICKET],
                    ], [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => [PermissionsList::CREATE_TICKET],
                    ], [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => [PermissionsList::UPDATE_TICKET],
                    ],[
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => [PermissionsList::DELETE_TICKET],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['validate-ticket'],
                        'roles' => [PermissionsList::VALIDATE_TICKET],
                                                

                    ],
                    [
                        'allow' => true,
                        'actions' => ['approveticket'],
                        'roles' => [PermissionsList::APPROVETICKET_BUTTON],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['disapproveticket'],
                        'roles' => [PermissionsList::DISAPPROVETICKET_BUTTON],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Createticket models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CreateticketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionValidateTicket()
    { 
        $searchModel = new CreateticketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('validateticket', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Createticket model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Createticket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Createticket();
        $model->id = Yii::$app->user->id; 
        if($model){
            $model->statusID = 1;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->createticketID]);
            }
        
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Createticket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->createticketID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Createticket model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Createticket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Createticket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Createticket::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
     public function actionApproveticket($id) {
        $model = $this->findModel($id);
        if($model){
            $model->statusID = 2;
           $model->save(false);
        }
        return $this->redirect(['validate-ticket']);
    }
     public function actionDisapproveticket($id) {
        $model = $this->findModel($id);
        if($model){
            $model->statusID = 3;
                     $model->save(false);
 
        }
        return $this->redirect(['validate-ticket']);
    }
}
