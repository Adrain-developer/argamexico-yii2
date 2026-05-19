<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Equipo extends ActiveRecord
{
    public ?UploadedFile $fotoFile = null;

    public static function tableName(): string
    {
        return 'equipo';
    }

    public function behaviors(): array
    {
        return [TimestampBehavior::class];
    }

    public function init(): void
    {
        parent::init();
        if ($this->isNewRecord) {
            $this->activo ??= 1;
            $this->orden  ??= 0;
        }
    }

    public function rules(): array
    {
        return [
            [['nombre'], 'required'],
            [['nombre', 'puesto', 'departamento'], 'string', 'max' => 160],
            [['foto'], 'string', 'max' => 255],
            [['division_id', 'orden'], 'integer'],
            [['activo'], 'boolean'],
            [['fotoFile'], 'file', 'extensions' => 'png, jpg, jpeg, webp', 'maxSize' => 4 * 1024 * 1024, 'skipOnEmpty' => true],
            [['division_id'], 'exist', 'targetClass' => Divisiones::class, 'targetAttribute' => 'id', 'skipOnEmpty' => true, 'skipOnError' => true],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id'           => 'ID',
            'nombre'       => 'Nombre del empleado',
            'puesto'       => 'Puesto',
            'departamento' => 'Departamento',
            'division_id'  => 'División',
            'foto'         => 'Foto',
            'fotoFile'     => 'Subir foto',
            'orden'        => 'Orden de aparición',
            'activo'       => 'Activo',
        ];
    }

    public function getDivision(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Divisiones::class, ['id' => 'division_id']);
    }

    public static function find(): \yii\db\ActiveQuery
    {
        return parent::find()->orderBy(['orden' => SORT_ASC, 'id' => SORT_ASC]);
    }

    public function uploadFoto(): bool
    {
        if (!$this->fotoFile) {
            return true;
        }
        $dir = \Yii::getAlias('@webroot/images/equipo');
        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
        $name = uniqid('eq_', false) . '.' . $this->fotoFile->extension;
        if ($this->fotoFile->saveAs($dir . '/' . $name)) {
            $this->foto = $name;
            return true;
        }
        return false;
    }

    public function getFotoUrl(): ?string
    {
        return $this->foto
            ? \Yii::$app->request->baseUrl . '/images/equipo/' . $this->foto
            : null;
    }

    public function toApiArray(): array
    {
        return [
            'id'           => $this->id,
            'nombre'       => $this->nombre,
            'puesto'       => $this->puesto,
            'departamento' => $this->departamento,
            'division'     => $this->division?->nombre,
            'foto'         => $this->getFotoUrl(),
        ];
    }
}
