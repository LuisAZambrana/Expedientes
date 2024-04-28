<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
 $conexion = new db();
 $conexion->configurar_lista_solo_opciones(15," username LIKE '%".$_POST['valorBusqueda']."%''",'personaid_destino',null);

?>