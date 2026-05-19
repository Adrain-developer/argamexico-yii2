<?php

namespace app\models;

use yii\db\ActiveRecord;

class ServicioImagenes extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'servicio_imagenes';
    }

    public function rules(): array
    {
        return [
            [['servicio_id', 'url'], 'required'],
            [['servicio_id', 'orden'], 'integer'],
            [['url'], 'string', 'max' => 500],
            [['url'], 'url'],
            [['caption'], 'string', 'max' => 200],
            [['servicio_id'], 'exist', 'targetClass' => Servicios::class, 'targetAttribute' => 'id'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id'          => 'ID',
            'servicio_id' => 'Servicio',
            'url'         => 'URL de la imagen',
            'caption'     => 'Pie de foto',
            'orden'       => 'Orden',
        ];
    }

    public function getServicio(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Servicios::class, ['id' => 'servicio_id']);
    }
}
