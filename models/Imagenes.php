<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imagenes".
 *
 * @property int $id
 * @property string $pathImagenIdxFire
 * @property string $tituloIdxFire
 * @property string $subtIdxFire
 * @property string|null $textoIdxFire
 * @property string $pathImagenIdxCons
 * @property string $tituloIdxCons
 * @property string $subtIdxCons
 * @property string|null $textoIdxCons
 * @property string $pathImagenIdxlabs
 * @property string $tituloIdxlabs
 * @property string $subtIdxlabs
 * @property string|null $textoIdxlabs
 * @property string $pathImagenIdxTr
 * @property string $tituloIdxTr
 * @property string $subtIdxTr
 * @property string|null $textoIdxTr
 * @property string $pathImagenIdxUno
 * @property string $pathImagenIdxDos
 * @property string $pathImagenIdxFireUno
 * @property string $pathImagenIdxFireDos
 * @property string $pathImagenIdxFireTres
 * @property string $pathImagenBnrIdxCons
 * @property string $tituloBnrIdxCons
 * @property string $pathImagenBnrIdxLabs
 * @property string $pathImagenFijasLabs
 * @property string $pathImagenHigieneLabs
 * @property string $pathImagenBnrIdxTraining
 * @property string $tituloBnrIdxTraining
 * @property string $pathImagenBnrContacto
 * @property string|null $seccion
 * @property string $pathImagenBnrLabs
 */
class Imagenes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imagenes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tituloIdxFire', 'subtIdxFire', 'tituloIdxCons', 'subtIdxCons', 'tituloIdxlabs', 'subtIdxlabs', 'tituloIdxTr', 'subtIdxTr', 'tituloBnrIdxCons', 'tituloBnrIdxTraining'], 'required'],
            [['pathImagenBnrIdxLabs', 'pathImagenHigieneLabs', 'pathImagenBnrIdxTraining', 'pathImagenBnrContacto', 'pathImagenBnrLabs', 'pathImagenIdxlabs', 'pathImagenIdxCons', 'pathImagenIdxFire', 'pathImagenIdxUno', 'pathImagenIdxDos', 'pathImagenIdxFireUno', 'pathImagenIdxFireDos', 'pathImagenIdxTr', 'pathImagenIdxFireTres', 'pathImagenBnrIdxCons', 'pathImagenFijasLabs'], 'string', 'max' => 200],
            [['tituloIdxFire', 'tituloIdxCons', 'tituloIdxlabs', 'tituloIdxTr'], 'string', 'max' => 30],
            [['subtIdxFire', 'subtIdxCons', 'subtIdxlabs', 'subtIdxTr'], 'string', 'max' => 50],
            [['textoIdxFire', 'textoIdxCons', 'textoIdxlabs', 'textoIdxTr', 'tituloBnrIdxCons', 'tituloBnrIdxTraining', 'seccion'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pathImagenIdxFire' => 'Path Imagen Idx Fire',
            'tituloIdxFire' => 'Títuto (texto principal)',
            'subtIdxFire' => 'Subtitulo',
            'textoIdxFire' => 'Complemento',
            'pathImagenIdxCons' => 'Path Imagen Idx Cons',
            'tituloIdxCons' => 'Títuto (texto principal)',
            'subtIdxCons' => 'Subtitulo',
            'textoIdxCons' => 'Complemento',
            'pathImagenIdxlabs' => 'Path Imagen Idxlabs',
            'tituloIdxlabs' => 'Títuto (texto principal)',
            'subtIdxlabs' => 'Subtitulo',
            'textoIdxlabs' => 'Complemento',
            'pathImagenIdxTr' => 'Path Imagen Idx Tr',
            'tituloIdxTr' => 'Títuto (texto principal)',
            'subtIdxTr' => 'Subtitulo',
            'textoIdxTr' => 'Complemento',
            'pathImagenIdxUno' => 'Path Imagen Idx Uno',
            'pathImagenIdxDos' => 'Path Imagen Idx Dos',
            'pathImagenIdxFireUno' => 'Path Imagen Idx Fire Uno',
            'pathImagenIdxFireDos' => 'Path Imagen Idx Fire Dos',
            'pathImagenIdxFireTres' => 'Path Imagen Idx Fire Tres',
            'pathImagenBnrIdxCons' => 'Path Imagen Bnr Idx Cons',
            'tituloBnrIdxCons' => 'Títuto (texto principal)',
            'pathImagenBnrIdxLabs' => 'Path Imagen Bnr Idx Labs',
            'pathImagenFijasLabs' => 'Path Imagen Fijas Labs',
            'pathImagenHigieneLabs' => 'Path Imagen Higiene Labs',
            'pathImagenBnrIdxTraining' => 'Path Imagen Bnr Idx Training',
            'tituloBnrIdxTraining' => 'Títuto (texto principal)',
            'pathImagenBnrContacto' => 'Path Imagen Bnr Contacto',
            'seccion' => 'seccion',
            'pathImagenBnrLabs' => 'pathImagenBnrLabs',
        ];
    }
}
