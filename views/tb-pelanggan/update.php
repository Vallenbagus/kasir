<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\Models\TbPelanggan $model */

$this->title = 'Update Tb Pelanggan: ' . $model->PelangganID;
$this->params['breadcrumbs'][] = ['label' => 'Tb Pelanggans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PelangganID, 'url' => ['view', 'PelangganID' => $model->PelangganID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-pelanggan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
