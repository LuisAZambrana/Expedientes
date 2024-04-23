<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");

$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, sema_rol_h.* FROM sema_rol_h  where rolid = -1",1,0);
$el_row["abm"]="a";
$el_row["rolds"]=$_POST["rolds"];
$el_row["activo"]= isset($_POST["activo"])?$_POST["activo"]:0;
$el_row["baja"]= 0;
$el_row["usuarioid"]= 12;
$el_row["fecharegistro"]= date('Ymd');
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("sema_rol_h",1,$el_row);
if ($prueba_1 > 0) {header("Location:/proyecto/view/seguridad/sema_rol_h/index.php");
}else{header("Location:crear.php");}
?>