<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TbPenjualan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tb-penjualan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tanggal_penjualan')->textInput() ?>

    <?= $form->field($model, 'Total_Harga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pelanggan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
