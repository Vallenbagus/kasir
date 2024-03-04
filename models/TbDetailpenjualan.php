<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_detailpenjualan".
 *
 * @property int $DetailPenjualanID
 * @property int $id_penjualan
 * @property int $id_barang
 * @property int $Jumlah_Produk
 * @property float $subtotal
 */
class TbDetailpenjualan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_detailpenjualan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penjualan', 'id_barang', 'Jumlah_Produk', 'subtotal'], 'required'],
            [['id_penjualan', 'id_barang', 'Jumlah_Produk'], 'integer'],
            [['subtotal'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'DetailPenjualanID' => 'Detail Penjualan ID',
            'id_penjualan' => 'Id Penjualan',
            'id_barang' => 'Id Barang',
            'Jumlah_Produk' => 'Jumlah Produk',
            'subtotal' => 'Subtotal',
        ];
    }
}
