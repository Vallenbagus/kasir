<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TbBarang $model */

$this->title = $model->BarangID;
$this->params['breadcrumbs'][] = ['label' => 'Tb Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tb-barang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'BarangID' => $model->BarangID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'BarangID' => $model->BarangID], [
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
            'BarangID',
            'nama_barang',
            'Harga',
            'Stok',
        ],
    ]) ?>

</div>
