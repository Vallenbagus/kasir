<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TbDetailpenjualan $model */

$this->title = $model->DetailPenjualanID;
$this->params['breadcrumbs'][] = ['label' => 'Tb Detailpenjualans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tb-detailpenjualan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'DetailPenjualanID' => $model->DetailPenjualanID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'DetailPenjualanID' => $model->DetailPenjualanID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'DetailPenjualanID',
            'id_penjualan',
            'id_barang',
            'Jumlah_Produk',
            'subtotal',
        ],
    ]) ?>

</div>
