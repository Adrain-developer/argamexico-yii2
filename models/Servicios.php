<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Servicios extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'servicios';
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function init(): void
    {
        parent::init();
        if ($this->isNewRecord) {
            $this->activo ??= 1;
        }
    }

    public function beforeSave($insert): bool
    {
        $this->orden ??= 0;
        return parent::beforeSave($insert);
    }

    public function rules(): array
    {
        return [
            [['division_id', 'titulo'], 'required'],
            [['division_id', 'orden', 'horas_curso'], 'integer'],
            [['es_curso', 'activo'], 'boolean'],
            [['code'], 'string', 'max' => 80],
            [['titulo', 'nombre_curso', 'duracion'], 'string', 'max' => 200],
            [['descripcion', 'evaluacion', 'icon_svg', 'descripcion_curso', 'temario',
              'incluye', 'contacto_emails', 'contacto_telefonos', 'direccion'], 'string'],
            [['division_id'], 'exist', 'targetClass' => Divisiones::class, 'targetAttribute' => 'id'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id'                 => 'ID',
            'division_id'        => 'División',
            'code'               => 'Código NOM',
            'titulo'             => 'Título del servicio',
            'descripcion'        => 'Descripción / Reconocimiento',
            'evaluacion'         => 'Evaluación',
            'icon_svg'           => 'Ícono SVG (opcional)',
            'es_curso'           => '¿Es curso?',
            'nombre_curso'       => 'Nombre del curso',
            'descripcion_curso'  => 'Descripción del curso',
            'temario'            => 'Temario (un tema por línea)',
            'duracion'           => 'Duración',
            'horas_curso'        => 'Horas del curso',
            'incluye'            => 'Incluye (uno por línea)',
            'contacto_emails'    => 'Correos de contacto (uno por línea)',
            'contacto_telefonos' => 'Teléfonos de contacto (uno por línea)',
            'direccion'          => 'Dirección',
            'orden'              => 'Orden',
            'activo'             => 'Activo',
        ];
    }

    public function getDivision(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Divisiones::class, ['id' => 'division_id']);
    }

    public function getImagenes(): \yii\db\ActiveQuery
    {
        return $this->hasMany(ServicioImagenes::class, ['servicio_id' => 'id'])
            ->orderBy('orden ASC, id ASC');
    }

    public function getTemarioList(): array
    {
        if (empty($this->temario)) {
            return [];
        }
        if (str_starts_with(trim($this->temario), '[')) {
            return json_decode($this->temario, true) ?? [];
        }
        return array_values(array_filter(array_map('trim', explode("\n", $this->temario))));
    }

    public function getIncluyeList(): array
    {
        return $this->decodeLines($this->incluye);
    }

    public function getEmailsList(): array
    {
        return $this->decodeLines($this->contacto_emails);
    }

    public function getTelefonosList(): array
    {
        return $this->decodeLines($this->contacto_telefonos);
    }

    private function decodeLines(?string $val): array
    {
        if (empty($val)) {
            return [];
        }
        if (str_starts_with(trim($val), '[')) {
            return json_decode($val, true) ?? [];
        }
        return array_values(array_filter(array_map('trim', explode("\n", $val))));
    }

    public function toApiArray(): array
    {
        return [
            'id'          => $this->id,
            'code'        => $this->code,
            'title'       => $this->titulo,
            'descripcion' => $this->descripcion,
            'evaluacion'  => $this->evaluacion,
            'es_curso'    => (bool)$this->es_curso,
            'icon'        => $this->icon_svg,
            'banners'     => array_map(
                fn(ServicioImagenes $img) => ['src' => $img->url, 'caption' => $img->caption ?? $this->titulo],
                $this->imagenes
            ),
        ];
    }
}
