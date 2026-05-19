<?php

use yii\db\Migration;

class m260519_100001_create_servicios_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('servicios', [
            'id'                 => $this->primaryKey(),
            'division_id'        => $this->integer()->notNull(),
            'code'               => $this->string(80)->null(),
            'titulo'             => $this->string(200)->notNull(),
            'descripcion'        => $this->text()->null(),
            'evaluacion'         => $this->text()->null(),
            'icon_svg'           => $this->text()->null()->comment('SVG opcional específico del servicio'),
            'es_curso'           => $this->boolean()->notNull()->defaultValue(false),
            'nombre_curso'       => $this->string(200)->null(),
            'descripcion_curso'  => $this->text()->null(),
            'temario'            => $this->text()->null()->comment('JSON array de temas'),
            'duracion'           => $this->string(100)->null(),
            'horas_curso'        => $this->smallInteger()->null(),
            'incluye'            => $this->text()->null()->comment('JSON array'),
            'contacto_emails'    => $this->text()->null()->comment('JSON array'),
            'contacto_telefonos' => $this->text()->null()->comment('JSON array'),
            'direccion'          => $this->text()->null(),
            'orden'              => $this->smallInteger()->notNull()->defaultValue(0),
            'activo'             => $this->boolean()->notNull()->defaultValue(true),
            'created_at'         => $this->integer()->null(),
            'updated_at'         => $this->integer()->null(),
        ]);

        $this->addForeignKey(
            'fk_servicios_division',
            'servicios', 'division_id',
            'divisiones', 'id',
            'CASCADE', 'CASCADE'
        );
        $this->createIndex('idx_servicios_division', 'servicios', 'division_id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_servicios_division', 'servicios');
        $this->dropTable('servicios');
    }
}
