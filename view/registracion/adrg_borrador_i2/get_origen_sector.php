<?php
   require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
   $conexion = new db();
   session_start();
   $sql_origen_sector = "SELECT * from adma_sector where baja = 0 and sectorid in(";
   $sql_origen_sector.= "SELECT sectorid from sema_usuario_i1 where activo = 1 and  personaid =";
   $sql_origen_sector.=  $_SESSION["usuarioid"].")";
   $conexion->configurar_lista_solo_opciones(10,$sql_origen_sector,'sectorid_origen',null);
?>