<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/adma_persona_i0_controller.php");
$obj = new adma_persona_i0_controller();
$obj->guardar($_POST["personaid"],$_POST["fecha_nacimiento"],$_POST["tipo_identificacionid"],$_POST["identificacionid"],$_POST["sexoid"],$_POST["cuil"],$_POST["estado_civil"],0,date('Y-m-d\TH:i:sP'));
?>