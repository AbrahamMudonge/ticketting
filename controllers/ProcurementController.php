<?php

namespace app\controllers;

use Yii;
use app\models\Procurement;
use app\models\ProcurementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\helpers\PermissionsList;
use yii\filters\AccessControl;

/**
 * ProcurementController implements the CRUD actions for Procurement model.
 */
class ProcurementController extends Controller
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
                        'roles' => [PermissionsList::VIEW_PROCUREMENT],
                    ], [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => [PermissionsList::CREATE_PROCUREMENT],
                    ], [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => [PermissionsList::UPDATE_PROCUREMENT],
                    ],[
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => [PermissionsList::DELETE_PROCUREMENT],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['margins'],
                        'roles' => [PermissionsList::VIEW_MARGINS],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Procurement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProcurementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
     public function actionMargins()
    {
        $searchModel = new ProcurementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('margins', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Procurement model.
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
     * Creates a new Procurement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Procurement();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->procurementID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Procurement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->procurementID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Procurement model.
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
     * Finds the Procurement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Procurement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Procurement::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
