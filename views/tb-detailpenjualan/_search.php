<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TbDetailpenjualanSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tb-detailpenjualan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'DetailPenjualanID') ?>

    <?= $form->field($model, 'id_penjualan') ?>

    <?= $form->field($model, 'id_barang') ?>

    <?= $form->field($model, 'Jumlah_Produk') ?>

    <?= $form->field($model, 'subtotal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
