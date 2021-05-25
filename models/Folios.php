<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "folios".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string $tipo
 */
class Folios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'folios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'tipo'], 'required'],
            [['descripcion'], 'string'],
            [['nombre', 'tipo'], 'string', 'max' => 250],
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
            'tipo' => 'Tipo',
        ];
    }
}
