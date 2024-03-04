<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/**  @var app\models\Detailtransaksi $model */

$this->title = 'Create Detailtransaksi';
$this->params['breadcrumbs'][] = ['label' => 'Detailtransaksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="detailpenjualan-create">
        <h1><?= Html::encode($this->title) ?></h1>
        <hr>
        <div class="transaction-form">
            <main id="main" class="main">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Transaction Page</h5>

                        <div class="row g-3">
                            <?php $form1 = ActiveForm::begin(['id' => 'my-form']); ?>
                            <?= Html::hiddenInput('formType', 'form1'); ?>
                            <div class="col-md-4">
                                <?= $form1->field($PenjualanModel, 'id_pelanggan')->label('Customer')->dropDownList(
                                    ['' => 'Choose Customers'] + \yii\helpers\ArrayHelper::map(\app\models\TbPelanggan::find()->all(), 'PelangganID', 'Nama_pelanggan')
                                ) ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form1->field($PenjualanModel, 'tanggal_penjualan')->label('Date')->textInput(['type' => 'date']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                            <hr>
                            <?php $form2 = ActiveForm::begin(); ?>
                            <?= Html::hiddenInput('formType', 'form2'); ?>
                            <div class="col-md-7">
                            <?= $form2->field($detailModel, 'id_barang')->label('Product')->dropDownList(
                            ['' => 'Choose Produk'] + \yii\helpers\ArrayHelper::map(\app\models\TbBarang::find()->all(), 'BarangID', 'nama_barang'),
                            ['id' => 'produk-id']
                        ) ?>

                            </div>
                            <!-- <div class="col-md-5">
                                <label class="control-label" for="product-price">Harga Produk</label>
                                <input type="text" id="product-price" class="form-control" readonly>
                            </div> -->
                            <div class="col-md-5">
                                <?= $form2->field($detailModel, 'Jumlah_Produk')->textInput() ?>
                            </div>
                            <!-- <div class="col-md-12">
                                <= $form2->field($detailTransaksiModel, 'subtotal')->textInput() ?>
                            </div> -->
                            <!-- <div class="col-md-4">
                            $form->field($transaksiModel, 'total_harga')->textInput() ?>
                        </div> -->
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
                                <?= Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
<main id="main" class="main">
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="fs-5 fw-bold">Keranjang</h1>
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($detailData as $index => $item) : ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= HTML::encode($item->product->nama_produk) ?></td>
                                    <td><?= HTML::encode($item->jumlah_produk) ?></td>
                                    <td><?= HTML::encode($item->subtotal) ?></td>
                                    <td>
                                        <?= \yii\helpers\Html::a('Cancel', ['delete', 'id' => $item->DetailPenjualanID], [
                                            'class' => 'btn btn-danger',
                                            'data'  => [
                                                'confirm'   => '',
                                                'method'    => 'post',
                                            ],
                                        ]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div>
                    <h1 class="fs-5 fw-bold">Ringkasan Pesanan</h1>
                    <div class="bg-secondary p-2 rounded">
                        <h1 class="fs-6">Total</h1>
                        <p class="text-danger fw-semibold">Rp <?= HTML::encode($totalPrice) ?></p>
                    </div>
                    <div class="my-3">
                        <label class="fs-6">Total</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <button id="submit-btn" type="submit" class=" bg-primary text-white  p-2 rounded border-0">Submit</button>
                </div>
            </div>
            <!-- End Multi Columns Form -->
        </div>
    </div>
</main>