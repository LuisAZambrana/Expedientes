<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/c_proc.php");
$procedimiento = new c_proc();
$elnombre_procedimento = $_GET['nombre'];
$elprocedimiento = $procedimiento->fcGetGenerarProcedimiento($elnombre_procedimento);
if ($elprocedimiento == 1 ) {header("Location:/proyecto/view/configuracion/index.php");}
?>
