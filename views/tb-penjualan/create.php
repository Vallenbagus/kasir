<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TbPenjualan $model */

$this->title = 'Create Tb Penjualan';
$this->params['breadcrumbs'][] = ['label' => 'Tb Penjualans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-penjualan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
