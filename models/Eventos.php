<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eventos".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string|null $fecha
 * @property int $id_categoria
 * @property string|null $pathImagen
 * @property string|null $pathInfo
 */
class Eventos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eventos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'id_categoria'], 'required'],
            [['descripcion', 'fecha'], 'string'],
            [['id_categoria'], 'integer'],
            [['nombre', 'pathImagen', 'pathInfo'], 'string', 'max' => 250],
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
            'fecha' => 'Fecha',
            'id_categoria' => 'Id Categoria',
            'pathImagen' => 'Path Imagen',
            'pathInfo' => 'Path Info',
        ];
    }
}
