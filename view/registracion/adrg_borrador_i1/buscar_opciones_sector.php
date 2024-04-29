<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
 $conexion = new db();
 $conexion->configurar_lista_solo_opciones(10,"SELECT * from adma_sector where sectords LIKE '%".$_POST['busqueda']."%'",'sectorid_destino',null);

?>