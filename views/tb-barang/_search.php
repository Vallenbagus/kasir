<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TbBarangSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tb-barang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'BarangID') ?>

    <?= $form->field($model, 'nama_barang') ?>

    <?= $form->field($model, 'Harga') ?>

    <?= $form->field($model, 'Stok') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
