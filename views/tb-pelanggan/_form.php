<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\Models\TbPelanggan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tb-pelanggan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nama_pelanggan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Nomer_telepon')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
