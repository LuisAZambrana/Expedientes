<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/adma_persona_controller.php");
$obj = new adma_persona_controller();
//$obj->guardar($_POST["nombre"],$_POST["apellido"]);
$db = new db();

$el_row = $db->fcGetSQL("SELECT 'a' as abm,adma_persona.* FROM adma_persona  where personaid = -1",1,0);
$el_row["abm"]="a";
$el_row["nombre"]=$_POST["nombre"];
$el_row["apellido"]=$_POST["apellido"];
$el_row["personaid"]= 0;
$el_row["baja"]= 0;
$el_row["usuarioid"]= 12;
$el_row["fecharegistro"]= date('Ymd');
//print_r ($el_row); 
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("adma_persona",1,$el_row);
//$prueba_1= $db->procedimiento_persona("a",$_POST["nombre"],$_POST["apellido"],0,32123,date('Ymd'));
if ($prueba_1 > 0) {
    header("Location:show.php?id=".$prueba_1);
}else{header("Location:create.php");}
?>