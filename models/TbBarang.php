<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_barang".
 *
 * @property int $BarangID
 * @property string $nama_barang
 * @property float $Harga
 * @property int $Stok
 */
class TbBarang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_barang', 'Harga', 'Stok'], 'required'],
            [['Harga'], 'number'],
            [['Stok'], 'integer'],
            [['nama_barang'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'BarangID' => 'Barang ID',
            'nama_barang' => 'Nama Barang',
            'Harga' => 'Harga',
            'Stok' => 'Stok',
        ];
    }
}
