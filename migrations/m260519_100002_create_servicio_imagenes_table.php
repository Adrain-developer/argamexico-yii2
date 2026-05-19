<?php

use yii\db\Migration;

class m260519_100002_create_servicio_imagenes_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('servicio_imagenes', [
            'id'          => $this->primaryKey(),
            'servicio_id' => $this->integer()->notNull(),
            'url'         => $this->string(500)->notNull(),
            'caption'     => $this->string(200)->null(),
            'orden'       => $this->smallInteger()->notNull()->defaultValue(0),
        ]);

        $this->addForeignKey(
            'fk_svc_imgs_servicio',
            'servicio_imagenes', 'servicio_id',
            'servicios', 'id',
            'CASCADE', 'CASCADE'
        );
        $this->createIndex('idx_svc_imgs_servicio', 'servicio_imagenes', 'servicio_id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_svc_imgs_servicio', 'servicio_imagenes');
        $this->dropTable('servicio_imagenes');
    }
}
