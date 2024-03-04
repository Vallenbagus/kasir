<?php

namespace app\controllers;

use app\models\TbPenjualan;
use app\models\TbPenjualanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TbPenjualanController implements the CRUD actions for TbPenjualan model.
 */
class TbPenjualanController extends Controller
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
     * Lists all TbPenjualan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TbPenjualanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TbPenjualan model.
     * @param int $id_penjualan Id Penjualan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_penjualan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_penjualan),
        ]);
    }

    /**
     * Creates a new TbPenjualan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TbPenjualan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_penjualan' => $model->id_penjualan]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TbPenjualan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_penjualan Id Penjualan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_penjualan)
    {
        $model = $this->findModel($id_penjualan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_penjualan' => $model->id_penjualan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TbPenjualan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_penjualan Id Penjualan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_penjualan)
    {
        $this->findModel($id_penjualan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TbPenjualan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_penjualan Id Penjualan
     * @return TbPenjualan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_penjualan)
    {
        if (($model = TbPenjualan::findOne(['id_penjualan' => $id_penjualan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
