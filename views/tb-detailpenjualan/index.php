<?php

use app\models\TbDetailpenjualan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TbDetailpenjualanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Detail Penjualan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-detailpenjualan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create TbDetailpenjualan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $detailDataProvider,
        'filterModel' => $detailSearchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'DetailPenjualanID',
            'id_penjualan',
            'id_barang',
            'Jumlah_Produk',
            'subtotal',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TbDetailpenjualan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'DetailPenjualanID' => $model->DetailPenjualanID]);
                 }
            ],
        ],
    ]); ?>


</div>
