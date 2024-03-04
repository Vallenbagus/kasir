<?php

namespace app\controllers;

use app\models\TbDetailpenjualan;
use app\models\TbDetailpenjualanSearch;
use app\models\TbPenjualan;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TbDetailpenjualanController implements the CRUD actions for TbDetailpenjualan model.
 */
class TbDetailpenjualanController extends Controller
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
     * Lists all TbDetailpenjualan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $detailSearchModel = new TbDetailpenjualanSearch();
        $detailDataProvider = $detailSearchModel->search($this->request->queryParams);

        $PenjualanSearchModel = new TbDetailpenjualanSearch();
        $PenjualanDataProvider = $PenjualanSearchModel->search($this->request->queryParams);

        return $this->render('index', [
            'detailSearchModel' => $detailSearchModel,
            'detailDataProvider' => $detailDataProvider,
            'PenjualanSearchModel' => $PenjualanSearchModel,
            'PenjualanDataProvider' => $PenjualanDataProvider,
        ]);
    }

    /**
     * Displays a single TbDetailpenjualan model.
     * @param int $DetailPenjualanID Detail Penjualan ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($DetailPenjualanID)
    {
        $PenjualanModel = $this->findTransaksiModel($DetailPenjualanID);

        $detailSearchModel = new TbDetailpenjualan();
        $detailDataProvider = $detailSearchModel->search(['DetailPenjualanID' => $DetailPenjualanID]);

        return $this->render('view', [
            'PenjualanModel' => $PenjualanModel,
            'detailSearchModel' => $detailSearchModel,
            'detailDataProvider' => $detailDataProvider,
        ]);
    }
    /**
     * Creates a new TbDetailpenjualan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $PenjualanModel = new TbPenjualan();
        $detailModel = new TbDetailpenjualan();
        $detailData = TbDetailpenjualan::find()->where(['id_penjualan' => null])->with('product')->all();
        $totalPrice = 0;
        foreach ($detailData as $detail) {
            $totalPrice += $detail->subtotal;
        }

        if ($this->request->isPost) {
            if (Yii::$app->request->post('formType') === 'form1') {
                $sale = new TbPenjualan();
                $sale->total_harga = $totalPrice;
                $sale->load(Yii::$app->request->post());
                if ($sale->save()) {
                    foreach ($detailData as $produk) {
                        $produk->id_penjualan = $sale->id_penjualan;
                        $produk->update();
                    }

                    Yii::$app->session->setFlash('success', 'Yey Success');
                    return $this->redirect(['create']);
                } else {
                    Yii::$app->session->setFlash('error', 'Failed');
                    return $this->redirect(['create']);
                }
            } elseif (Yii::$app->request->post('formType') === 'form2') {
                $detailModel->load(Yii::$app->request->post());
                $detailModel->id_penjualan = NULL;
                $detailModel->save();
            }
        }

        return $this->render('create', [
            'PenjualanModel' => $PenjualanModel,
            'detailModel' => $detailModel,
            'detailData' => $detailData,
            'totalPrice' => $totalPrice
        ]);
    }

    /**
     * Updates an existing TbDetailpenjualan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $DetailPenjualanID Detail Penjualan ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($DetailPenjualanID)
    {
        $PenjualanModel = $this->findPenjualanModel($DetailPenjualanID);
        $detailModel = $this->findDetailModel($DetailPenjualanID);

        if ($this->request->isPost) {
            $PenjualanModel->load($this->request->post());
            $detailModel->load($this->request->post());

            if ($PenjualanModel->validate() && $detailModel->validate()) {
                $PenjualanModel->save();
                $detailModel->id_detail = $PenjualanModel->id_penjualan;
                $detailModel->save();

                return $this->redirect(['view', 'DetailPenjualanID' => $PenjualanModel->id_detail]);
            }
        }
        return $this->render('update', [
            'PenjualanModel' => $PenjualanModel,
            'detailModel' => $detailModel,
        ]);
    }

    /**
     * Deletes an existing TbDetailpenjualan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $DetailPenjualanID Detail Penjualan ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $getDetail = TbDetailpenjualan::findOne($id);

        $getDetail->delete();
        Yii::$app->session->setFlash('success', 'Data Berhasil dihapus');

        return $this->redirect(['create']);
    }

    /**
     * Finds the TbDetailpenjualan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $DetailPenjualanID Detail Penjualan ID
     * @return TbDetailpenjualan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($DetailPenjualanID)
    {
        if (($model = TbDetailpenjualan::findOne(['DetailPenjualanID' => $DetailPenjualanID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
}
