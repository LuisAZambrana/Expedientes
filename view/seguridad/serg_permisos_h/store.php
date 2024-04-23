<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");

$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, serg_permisos_h.* FROM serg_permisos_h  where permisoid = -1",1,0);
$el_row["abm"]="a";
$el_row["objetoid"]=$_POST["objetoid"];
$el_row["rolid"]=$_POST["rolid"];
$el_row["accionid"]=$_POST["accionid"];
$el_row["activo"]= isset($_POST["activo"])?$_POST["activo"]:0;
$el_row["baja"]= 0;
$el_row["usuarioid"]= 12;
$el_row["fecharegistro"]= date('Ymd');
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("serg_permisos_h",1,$el_row);
if ($prueba_1 > 0) {header("Location:/proyecto/view/seguridad/serg_permisos_h/index.php");
}else{header("Location:crear.php");}
?>