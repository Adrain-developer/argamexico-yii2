<?php

use yii\db\Migration;

class m260519_100000_create_divisiones_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('divisiones', [
            'id'          => $this->primaryKey(),
            'nombre'      => $this->string(120)->notNull(),
            'slug'        => $this->string(100)->notNull()->unique(),
            'color'       => $this->string(10)->notNull()->defaultValue('teal'),
            'tagline'     => $this->string(200)->null(),
            'descripcion' => $this->text()->null(),
            'icon_svg'    => $this->text()->null(),
            'noms'        => $this->text()->null()->comment('JSON array'),
            'orden'       => $this->smallInteger()->notNull()->defaultValue(0),
            'activo'      => $this->boolean()->notNull()->defaultValue(true),
            'created_at'  => $this->integer()->null(),
            'updated_at'  => $this->integer()->null(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('divisiones');
    }
}
