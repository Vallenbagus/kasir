<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TbpelangganSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tb-pelanggan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PelangganID') ?>

    <?= $form->field($model, 'Nama_pelanggan') ?>

    <?= $form->field($model, 'Alamat') ?>

    <?= $form->field($model, 'Nomer_telepon') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
