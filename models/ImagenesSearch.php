<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Imagenes;

/**
 * ImagenesSearch represents the model behind the search form of `app\models\Imagenes`.
 */
class ImagenesSearch extends Imagenes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['pathImagenIdxFire', 'tituloIdxFire', 'subtIdxFire', 'textoIdxFire', 'pathImagenIdxCons', 'tituloIdxCons', 'subtIdxCons', 'textoIdxCons', 'pathImagenIdxlabs', 'tituloIdxlabs', 'subtIdxlabs', 'textoIdxlabs', 'pathImagenIdxTr', 'tituloIdxTr', 'subtIdxTr', 'textoIdxTr', 'pathImagenIdxUno', 'pathImagenIdxDos', 'pathImagenIdxFireUno', 'pathImagenIdxFireDos', 'pathImagenIdxFireTres', 'pathImagenBnrIdxCons', 'tituloBnrIdxCons', 'pathImagenBnrIdxLabs', 'pathImagenFijasLabs', 'pathImagenHigieneLabs', 'pathImagenBnrIdxTraining', 'tituloBnrIdxTraining', 'pathImagenBnrContacto'], 'safe'],
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
        $query = Imagenes::find();

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'pathImagenIdxFire', $this->pathImagenIdxFire])
            ->andFilterWhere(['like', 'tituloIdxFire', $this->tituloIdxFire])
            ->andFilterWhere(['like', 'subtIdxFire', $this->subtIdxFire])
            ->andFilterWhere(['like', 'textoIdxFire', $this->textoIdxFire])
            ->andFilterWhere(['like', 'pathImagenIdxCons', $this->pathImagenIdxCons])
            ->andFilterWhere(['like', 'tituloIdxCons', $this->tituloIdxCons])
            ->andFilterWhere(['like', 'subtIdxCons', $this->subtIdxCons])
            ->andFilterWhere(['like', 'textoIdxCons', $this->textoIdxCons])
            ->andFilterWhere(['like', 'pathImagenIdxlabs', $this->pathImagenIdxlabs])
            ->andFilterWhere(['like', 'tituloIdxlabs', $this->tituloIdxlabs])
            ->andFilterWhere(['like', 'subtIdxlabs', $this->subtIdxlabs])
            ->andFilterWhere(['like', 'textoIdxlabs', $this->textoIdxlabs])
            ->andFilterWhere(['like', 'pathImagenIdxTr', $this->pathImagenIdxTr])
            ->andFilterWhere(['like', 'tituloIdxTr', $this->tituloIdxTr])
            ->andFilterWhere(['like', 'subtIdxTr', $this->subtIdxTr])
            ->andFilterWhere(['like', 'textoIdxTr', $this->textoIdxTr])
            ->andFilterWhere(['like', 'pathImagenIdxUno', $this->pathImagenIdxUno])
            ->andFilterWhere(['like', 'pathImagenIdxDos', $this->pathImagenIdxDos])
            ->andFilterWhere(['like', 'pathImagenIdxFireUno', $this->pathImagenIdxFireUno])
            ->andFilterWhere(['like', 'pathImagenIdxFireDos', $this->pathImagenIdxFireDos])
            ->andFilterWhere(['like', 'pathImagenIdxFireTres', $this->pathImagenIdxFireTres])
            ->andFilterWhere(['like', 'pathImagenBnrIdxCons', $this->pathImagenBnrIdxCons])
            ->andFilterWhere(['like', 'tituloBnrIdxCons', $this->tituloBnrIdxCons])
            ->andFilterWhere(['like', 'pathImagenBnrIdxLabs', $this->pathImagenBnrIdxLabs])
            ->andFilterWhere(['like', 'pathImagenFijasLabs', $this->pathImagenFijasLabs])
            ->andFilterWhere(['like', 'pathImagenHigieneLabs', $this->pathImagenHigieneLabs])
            ->andFilterWhere(['like', 'pathImagenBnrIdxTraining', $this->pathImagenBnrIdxTraining])
            ->andFilterWhere(['like', 'tituloBnrIdxTraining', $this->tituloBnrIdxTraining])
            ->andFilterWhere(['like', 'pathImagenBnrContacto', $this->pathImagenBnrContacto]);

        return $dataProvider;
    }
}
