<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Mascotas extends ActiveRecord
{
    /** Número de WhatsApp por defecto (sólo dígitos, formato internacional). */
    public const WA_DEFAULT = '522225409946';

    /** Prefijo del mensaje enviado a la API de WhatsApp. */
    public const WA_PREFIJO = 'Me interesa más información sobre:';

    /** Largo máximo del mensaje del diálogo. */
    public const MENSAJE_MAX = 65;

    public static function tableName(): string
    {
        return 'mascotas';
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
            [['imagen', 'mensaje'], 'required'],
            [['mensaje'], 'string', 'max' => self::MENSAJE_MAX],
            [['imagen'], 'string', 'max' => 160],
            [['imagen'], 'in', 'range' => array_keys(self::availableImages()),
                'message' => 'Selecciona una imagen de mascota válida.'],
            [['posicion'], 'in', 'range' => ['izquierda', 'derecha', 'centro']],
            [['wa_numero'], 'trim'],
            [['wa_numero'], 'match', 'pattern' => '/^[0-9+\s()-]{8,20}$/',
                'message' => 'Número inválido. Usa formato internacional, ej: +52 2225409946.',
                'skipOnEmpty' => true],
            [['orden'], 'integer'],
            [['activo'], 'boolean'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id'        => 'ID',
            'imagen'    => 'Mascota',
            'posicion'  => 'Posición',
            'mensaje'   => 'Mensaje del diálogo',
            'wa_numero' => 'Número de WhatsApp',
            'orden'     => 'Orden de aparición',
            'activo'    => 'Activo',
        ];
    }

    public static function find(): \yii\db\ActiveQuery
    {
        return parent::find()->orderBy(['orden' => SORT_ASC, 'id' => SORT_ASC]);
    }

    public function beforeSave($insert): bool
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        // La posición se deriva siempre del nombre del archivo elegido.
        $this->posicion = self::posicionFromImage($this->imagen);

        if ((int) $this->orden === 0) {
            $this->orden = (int) static::find()->max('orden') + 1;
        }
        return true;
    }

    /**
     * Lista de imágenes disponibles en /images/mascota indexadas por nombre de archivo.
     * @return array<string,array{label:string,posicion:string,url:string}>
     */
    public static function availableImages(): array
    {
        $dir = \Yii::getAlias('@webroot/images/mascota');
        if (!is_dir($dir)) {
            return [];
        }
        $out = [];
        foreach (glob($dir . '/*.{png,jpg,jpeg,webp,PNG,JPG}', GLOB_BRACE) ?: [] as $path) {
            $file = basename($path);
            $out[$file] = [
                'label'    => self::prettyLabel($file),
                'posicion' => self::posicionFromImage($file),
                'url'      => \Yii::$app->request->baseUrl . '/images/mascota/' . $file,
            ];
        }
        ksort($out);
        return $out;
    }

    public static function posicionFromImage(string $file): string
    {
        $f = mb_strtolower($file);
        if (str_contains($f, 'izquierd')) {
            return 'izquierda';
        }
        if (str_contains($f, 'derech')) {
            return 'derecha';
        }
        return 'centro';
    }

    private static function prettyLabel(string $file): string
    {
        $name = preg_replace('/\.[^.]+$/', '', $file);
        return ucfirst(str_replace('-', ' ', $name));
    }

    public function getImagenUrl(): string
    {
        return \Yii::$app->request->baseUrl . '/images/mascota/' . $this->imagen;
    }

    /** Número en formato wa.me (sólo dígitos), con fallback al default. */
    public function getWaNumero(): string
    {
        $num = preg_replace('/\D+/', '', (string) $this->wa_numero);
        return $num !== '' ? $num : self::WA_DEFAULT;
    }

    public function getWaLink(): string
    {
        // Prefijo + 2 saltos de línea + mensaje en negrita + link (para preview OG)
        $url   = \Yii::$app->urlManager->createAbsoluteUrl(['/site/index']);
        $texto = self::WA_PREFIJO . "\n\n*" . $this->mensaje . "*\n\n" . $url;
        return 'https://wa.me/' . $this->getWaNumero() . '?text=' . rawurlencode($texto);
    }

    public function toApiArray(): array
    {
        return [
            'imagen'   => $this->getImagenUrl(),
            'posicion' => $this->posicion,
            'mensaje'  => $this->mensaje,
            'wa'       => $this->getWaLink(),
        ];
    }
}
