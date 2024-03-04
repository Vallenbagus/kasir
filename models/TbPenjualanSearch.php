<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbPenjualan;

/**
 * TbPenjualanSearch represents the model behind the search form of `app\models\TbPenjualan`.
 */
class TbPenjualanSearch extends TbPenjualan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penjualan', 'id_pelanggan'], 'integer'],
            [['tanggal_penjualan'], 'safe'],
            [['Total_Harga'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TbPenjualan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_penjualan' => $this->id_penjualan,
            'tanggal_penjualan' => $this->tanggal_penjualan,
            'Total_Harga' => $this->Total_Harga,
            'id_pelanggan' => $this->id_pelanggan,
        ]);

        return $dataProvider;
    }
}
