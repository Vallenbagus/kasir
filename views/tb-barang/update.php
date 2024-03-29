<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TbBarang $model */

$this->title = 'Update Tb Barang: ' . $model->BarangID;
$this->params['breadcrumbs'][] = ['label' => 'Tb Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->BarangID, 'url' => ['view', 'BarangID' => $model->BarangID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-barang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
