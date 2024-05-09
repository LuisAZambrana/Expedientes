<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/c_proc.php");
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
$db = new db();
$procedimiento = new c_proc();
$elnombre_procedimento = $db->codificar_valor_no_numero($_GET['nombre'],0);

$elprocedimiento = $procedimiento->fcGetGenerarProcedimiento($elnombre_procedimento);
if ($elprocedimiento == 1 ) {header("Location:/proyecto/view/configuracion/index.php");}
?>
