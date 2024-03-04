<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\Models\TbPelanggan $model */

$this->title = 'Create Tb Pelanggan';
$this->params['breadcrumbs'][] = ['label' => 'Tb Pelanggans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-pelanggan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
