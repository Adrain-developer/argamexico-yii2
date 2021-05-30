<h4>Se ha recibido una solicitud de cotización con los siguientes datos</h4>

Nombre: <strong><?= $nombre ?></strong><br>
Teléfono: <strong><?= $numero ?></strong><br>
E-mail: <strong><?= $correo ?></strong><br>


Listado de productos a cotizar: <br>
<?php
foreach($detalles as $detalle){ ?>
<p>ID Producto: <?= $detalle["producto_id"]?></p><br>
<p>Cantidad: <?= $detalle["cantidad"]?></p><br>
<p>Nombre: <?= $detalle["concepto"]?></p><br>
<?php } ?>