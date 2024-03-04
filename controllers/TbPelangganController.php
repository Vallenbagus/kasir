<?php

namespace app\controllers;

use app\Models\TbPelanggan;
use app\models\TbpelangganSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TbPelangganController implements the CRUD actions for TbPelanggan model.
 */
class TbPelangganController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TbPelanggan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TbpelangganSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TbPelanggan model.
     * @param int $PelangganID Pelanggan ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($PelangganID)
    {
        return $this->render('view', [
            'model' => $this->findModel($PelangganID),
        ]);
    }

    /**
     * Creates a new TbPelanggan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TbPelanggan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'PelangganID' => $model->PelangganID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TbPelanggan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $PelangganID Pelanggan ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($PelangganID)
    {
        $model = $this->findModel($PelangganID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'PelangganID' => $model->PelangganID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TbPelanggan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $PelangganID Pelanggan ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($PelangganID)
    {
        $this->findModel($PelangganID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TbPelanggan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $PelangganID Pelanggan ID
     * @return TbPelanggan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($PelangganID)
    {
        if (($model = TbPelanggan::findOne(['PelangganID' => $PelangganID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
