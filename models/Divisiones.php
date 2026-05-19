<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Divisiones extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'divisiones';
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

    public function rules(): array
    {
        return [
            [['nombre', 'slug'], 'required'],
            [['nombre'], 'string', 'max' => 120],
            [['slug'], 'string', 'max' => 100],
            [['slug'], 'unique'],
            [['slug'], 'match', 'pattern' => '/^[a-z0-9\-]+$/'],
            [['color'], 'in', 'range' => ['teal', 'red']],
            [['tagline'], 'string', 'max' => 200],
            [['descripcion', 'icon_svg', 'noms'], 'string'],
            [['activo'], 'boolean'],
        ];
    }

    protected function beforeSave(bool $insert): bool
    {
        if ($insert && empty($this->color)) {
            $last = static::find()->orderBy(['id' => SORT_DESC])->select('color')->scalar();
            $this->color = ($last === 'teal') ? 'red' : 'teal';
        }
        $this->orden ??= 0;
        if (!empty($this->noms)) {
            $decoded = json_decode($this->noms, true);
            $this->noms = is_array($decoded)
                ? json_encode(array_values(array_filter($decoded)), JSON_UNESCAPED_UNICODE)
                : '[]';
        }
        return parent::beforeSave($insert);
    }

    public function attributeLabels(): array
    {
        return [
            'id'          => 'ID',
            'nombre'      => 'Nombre',
            'slug'        => 'Slug (URL)',
            'color'       => 'Color del escudo',
            'tagline'     => 'Tagline',
            'descripcion' => 'Descripción',
            'icon_svg'    => 'Ícono SVG',
            'noms'        => 'NOMs / Certificaciones',
            'orden'       => 'Orden de aparición',
            'activo'      => 'Activo',
            'created_at'  => 'Creado',
            'updated_at'  => 'Actualizado',
        ];
    }

    public function getServicios(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Servicios::class, ['division_id' => 'id'])
            ->orderBy('orden ASC, id ASC');
    }

    public function getServiciosActivos(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Servicios::class, ['division_id' => 'id'])
            ->where(['activo' => 1])
            ->orderBy('orden ASC, id ASC');
    }

    public function getNomsList(): array
    {
        if (empty($this->noms)) {
            return [];
        }
        $decoded = json_decode($this->noms, true);
        return is_array($decoded) ? $decoded : [];
    }

    public function getCssClass(): string
    {
        return $this->color === 'red' ? 'green' : 'teal';
    }

    public static function find(): \yii\db\ActiveQuery
    {
        return parent::find()->orderBy(['id' => SORT_ASC]);
    }

    public function toApiArray(): array
    {
        // serviciosActivos es la relación eager-loaded desde SiteController
        $items = $this->serviciosActivos ?? [];

        return [
            'id'          => $this->id,
            'slug'        => $this->slug,
            'name'        => $this->nombre,
            'color'       => $this->color,
            'tagline'     => $this->tagline,
            'descripcion' => $this->descripcion,
            'icon'        => $this->icon_svg,
            'noms'        => $this->getNomsList(),
            'items'       => array_map(fn(Servicios $s) => $s->toApiArray(), $items),
        ];
    }
}
