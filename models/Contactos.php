<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contactos".
 *
 * @property int $id
 * @property string $nombre
 * @property string $telefono
 * @property string $correo
 * @property string $descripcion
 * @property string $categoria
 */
class Contactos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contactos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'telefono', 'correo', 'descripcion'], 'required'],
            [['descripcion'], 'string'],
            [['nombre', 'correo'], 'string', 'max' => 250],
            [['telefono'], 'string', 'max' => 50],
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
            'telefono' => 'Telefono',
            'correo' => 'Correo',
            'descripcion' => 'Descripcion',            
        ];
    }
}
