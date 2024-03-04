<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\Models\TbPelanggan $model */

$this->title = $model->PelangganID;
$this->params['breadcrumbs'][] = ['label' => 'Tb Pelanggans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tb-pelanggan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'PelangganID' => $model->PelangganID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'PelangganID' => $model->PelangganID], [
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
            'PelangganID',
            'Nama_pelanggan',
            'Alamat:ntext',
            'Nomer_telepon',
        ],
    ]) ?>

</div>
