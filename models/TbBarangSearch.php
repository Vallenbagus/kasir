<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbBarang;

/**
 * TbBarangSearch represents the model behind the search form of `app\models\TbBarang`.
 */
class TbBarangSearch extends TbBarang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['BarangID', 'Stok'], 'integer'],
            [['nama_barang'], 'safe'],
            [['Harga'], 'number'],
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
        $query = TbBarang::find();

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
            'BarangID' => $this->BarangID,
            'Harga' => $this->Harga,
            'Stok' => $this->Stok,
        ]);

        $query->andFilterWhere(['like', 'nama_barang', $this->nama_barang]);

        return $dataProvider;
    }
}
