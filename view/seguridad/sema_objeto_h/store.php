<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");

$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, sema_objeto_h.* FROM sema_objeto_h  where objetoid = -1",1,0);
$el_row["abm"]="a";
$el_row["tipoobjetoid"]=$_POST["tipoobjetoid"];
$el_row["nombreobjetods"]=$_POST["nombreobjetods"];
$el_row["formularioid"]= $_POST["formularioid"];
$el_row["menuid"]= $_POST["menuid"];
$el_row["baja"]= 0;
$el_row["usuarioid"]= 12;
$el_row["fecharegistro"]= date('Ymd');
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("sema_objeto_h",1,$el_row);
if ($prueba_1 > 0) {header("Location:/proyecto/view/seguridad/sema_objeto_h/index.php");
}else{header("Location:crear.php");}
?>