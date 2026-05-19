<?php

use yii\db\Migration;

class m260519_200000_create_equipo_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('equipo', [
            'id'           => $this->primaryKey(),
            'nombre'       => $this->string(160)->notNull(),
            'puesto'       => $this->string(160)->null(),
            'departamento' => $this->string(160)->null(),
            'division_id'  => $this->integer()->null(),
            'foto'         => $this->string(255)->null(),
            'orden'        => $this->smallInteger()->notNull()->defaultValue(0),
            'activo'       => $this->boolean()->notNull()->defaultValue(true),
            'created_at'   => $this->integer()->null(),
            'updated_at'   => $this->integer()->null(),
        ]);

        $this->addForeignKey(
            'fk_equipo_division',
            'equipo',
            'division_id',
            'divisiones',
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_equipo_division', 'equipo');
        $this->dropTable('equipo');
    }
}
