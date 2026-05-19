<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class ServiciosSearch extends Servicios
{
    public function rules(): array
    {
        return [
            [['id', 'division_id', 'orden', 'activo', 'es_curso'], 'integer'],
            [['titulo', 'code'], 'safe'],
        ];
    }

    public function scenarios(): array
    {
        return Model::scenarios();
    }

    public function search(array $params): ActiveDataProvider
    {
        $query = Servicios::find()->with('division');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => ['defaultOrder' => ['division_id' => SORT_ASC, 'id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'division_id' => $this->division_id,
            'activo'      => $this->activo,
            'es_curso'    => $this->es_curso,
        ]);
        $query->andFilterWhere(['like', 'titulo', $this->titulo]);
        $query->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
