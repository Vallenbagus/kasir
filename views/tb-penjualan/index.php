<?php

use app\models\TbPenjualan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TbPenjualanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Penjualan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-penjualan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tb Penjualan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_penjualan',
            'tanggal_penjualan',
            'Total_Harga',
            'id_pelanggan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TbPenjualan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_penjualan' => $model->id_penjualan]);
                 }
            ],
        ],
    ]); ?>


</div>
