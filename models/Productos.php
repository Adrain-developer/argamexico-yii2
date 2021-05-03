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
 * @property int|null $id_categoria
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
            [['estatus', 'id_categoria'], 'integer'],
            [['nombre', 'pathImagen'], 'string', 'max' => 250],
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
            'id_categoria' => 'Id Categoria',
        ];
    }

    public function getCategoria(){
        return $this->hasOne(Categorias::className(), ['id' => 'id_categoria']);
    }
}
