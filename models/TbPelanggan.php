<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_pelanggan".
 *
 * @property int $PelangganID
 * @property string $Nama_pelanggan
 * @property string $Alamat
 * @property string $Nomer_telepon
 */
class TbPelanggan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_pelanggan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nama_pelanggan', 'Alamat', 'Nomer_telepon'], 'required'],
            [['Alamat'], 'string'],
            [['Nama_pelanggan'], 'string', 'max' => 150],
            [['Nomer_telepon'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PelangganID' => 'Pelanggan ID',
            'Nama_pelanggan' => 'Nama Pelanggan',
            'Alamat' => 'Alamat',
            'Nomer_telepon' => 'Nomer Telepon',
        ];
    }
}
