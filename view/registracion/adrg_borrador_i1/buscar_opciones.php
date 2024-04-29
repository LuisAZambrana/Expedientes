<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
 $conexion = new db();
 $conexion->configurar_lista_solo_opciones(15,"SELECT * from tbl_member where username LIKE '%".$_POST['busqueda']."%'",'personaid_destino',null);

?>