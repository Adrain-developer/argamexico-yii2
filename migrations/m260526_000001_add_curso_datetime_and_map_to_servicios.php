<?php

use yii\db\Migration;

class m260526_000001_add_curso_datetime_and_map_to_servicios extends Migration
{
    public function safeUp()
    {
        $this->addColumn('servicios', 'fecha_curso', $this->date()->null()->after('direccion'));
        $this->addColumn('servicios', 'hora_curso',  $this->string(30)->null()->after('fecha_curso'));
        $this->addColumn('servicios', 'mapa_iframe', $this->text()->null()->after('hora_curso'));
    }

    public function safeDown()
    {
        $this->dropColumn('servicios', 'fecha_curso');
        $this->dropColumn('servicios', 'hora_curso');
        $this->dropColumn('servicios', 'mapa_iframe');
    }
}
