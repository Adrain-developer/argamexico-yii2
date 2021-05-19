<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "publicaciones".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string $seccion
 * @property string|null $pathImagen
 * @property int $estatus
 */
class Publicaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publicaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'seccion'], 'required'],
            [['nombre', 'descripcion'], 'string'],
            [['estatus'], 'integer'],
            [['seccion', 'pathImagen'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'seccion' => 'Seccion',
            'pathImagen' => 'Path Imagen',
            'estatus' => 'Estatus',
        ];
    }
}
