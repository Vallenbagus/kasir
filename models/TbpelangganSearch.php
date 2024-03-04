<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\Models\TbPelanggan;

/**
 * TbpelangganSearch represents the model behind the search form of `app\Models\TbPelanggan`.
 */
class TbpelangganSearch extends TbPelanggan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PelangganID'], 'integer'],
            [['Nama_pelanggan', 'Alamat', 'Nomer_telepon'], 'safe'],
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
        $query = TbPelanggan::find();

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
            'PelangganID' => $this->PelangganID,
        ]);

        $query->andFilterWhere(['like', 'Nama_pelanggan', $this->Nama_pelanggan])
            ->andFilterWhere(['like', 'Alamat', $this->Alamat])
            ->andFilterWhere(['like', 'Nomer_telepon', $this->Nomer_telepon]);

        return $dataProvider;
    }
}
