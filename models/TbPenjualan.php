<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_penjualan".
 *
 * @property int $id_penjualan
 * @property string $tanggal_penjualan
 * @property float $Total_Harga
 * @property int $id_pelanggan
 */
class TbPenjualan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_penjualan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_penjualan', 'Total_Harga', 'id_pelanggan'], 'required'],
            [['tanggal_penjualan'], 'safe'],
            [['Total_Harga'], 'number'],
            [['id_pelanggan'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_penjualan' => 'Id Penjualan',
            'tanggal_penjualan' => 'Tanggal Penjualan',
            'Total_Harga' => 'Total Harga',
            'id_pelanggan' => 'Id Pelanggan',
        ];
    }
}
