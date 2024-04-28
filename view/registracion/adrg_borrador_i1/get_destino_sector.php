<?php
   require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
   $conexion = new db();
   $conexion->configurar_lista_solo_opciones(10,null,'sectorid_destino',null);
?>