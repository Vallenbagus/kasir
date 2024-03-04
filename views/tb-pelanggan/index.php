<?php

use app\Models\TbPelanggan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TbpelangganSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Pelanggan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-pelanggan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tb Pelanggan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PelangganID',
            'Nama_pelanggan',
            'Alamat:ntext',
            'Nomer_telepon',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TbPelanggan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'PelangganID' => $model->PelangganID]);
                 }
            ],
        ],
    ]); ?>


</div>
