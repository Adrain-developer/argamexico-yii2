<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class DivisionesSearch extends Divisiones
{
    public function rules(): array
    {
        return [
            [['id', 'orden', 'activo'], 'integer'],
            [['nombre', 'slug', 'color', 'tagline'], 'safe'],
        ];
    }

    public function scenarios(): array
    {
        return Model::scenarios();
    }

    public function search(array $params): ActiveDataProvider
    {
        $query = Divisiones::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => ['defaultOrder' => ['id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id, 'activo' => $this->activo, 'color' => $this->color]);
        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
