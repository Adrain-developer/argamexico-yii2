<?php

use yii\db\Migration;

/**
 * Tabla `mascotas`: administra la Mascota Tigre (imagen, mensaje del diálogo,
 * número de WhatsApp opcional y posición en pantalla).
 */
class m260530_120000_create_mascotas_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('mascotas', [
            'id'         => $this->primaryKey(),
            'imagen'     => $this->string(160)->notNull()->comment('Archivo en /images/mascota'),
            'posicion'   => $this->string(10)->notNull()->defaultValue('centro')->comment('izquierda | derecha | centro'),
            'mensaje'    => $this->string(65)->notNull()->comment('Texto del diálogo (máx 65)'),
            'wa_numero'  => $this->string(20)->null()->comment('Override de número WhatsApp (opcional)'),
            'orden'      => $this->smallInteger()->notNull()->defaultValue(0),
            'activo'     => $this->boolean()->notNull()->defaultValue(true),
            'created_at' => $this->integer()->null(),
            'updated_at' => $this->integer()->null(),
        ]);

        $now = time();
        $this->batchInsert('mascotas',
            ['imagen', 'posicion', 'mensaje', 'orden', 'activo', 'created_at', 'updated_at'],
            [
                ['Tigre-central-dos-manos-arriba.png', 'centro',    '¿En tu empresa hay trabajo en bipedestación?', 1, 1, $now, $now],
                ['Tigre-derecho-idea.png',             'derecha',   '¿Ya tienes tu Análisis de Riesgo de Incendio?', 2, 1, $now, $now],
                ['Tigre-izquierdo-senialando.png',     'izquierda', '¿Cumples con la NOM-002-STPS?',                 3, 1, $now, $now],
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('mascotas');
    }
}
