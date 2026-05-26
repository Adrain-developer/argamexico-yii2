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
            [['servicio_id'], 'required'],
            [['servicio_id', 'orden'], 'integer'],
            [['url'], 'string', 'max' => 500],
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

    public function getWebUrl(): string
    {
        if (str_starts_with($this->url, 'http://') || str_starts_with($this->url, 'https://')) {
            return $this->url;
        }
        return \Yii::$app->request->baseUrl . '/images/servicios/' . $this->url;
    }
}
