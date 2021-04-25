<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property float $precioUnitario
 * @property string $pathImagen
 * @property int $estatus
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['descripcion'], 'string'],
            [['precioUnitario'], 'number'],
            [['estatus'], 'integer'],
            [['nombre'], 'string', 'max' => 250]
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
            'precioUnitario' => 'Precio Unitario',
            'pathImagen' => 'Path Imagen',
            'estatus' => 'Estatus',
        ];
    }
}
