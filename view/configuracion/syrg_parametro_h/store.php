<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");

$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, syrg_parametro_h.* FROM syrg_parametro_h  where parametroid = -1",1,0);
$el_row["abm"]="a";
$el_row["parametrods"]=$_POST["parametrods"];
$el_row["valor"]=$_POST["valor"];
$el_row["baja"]= 0;
$el_row["usuarioid"]= 12;
$el_row["fecharegistro"]= date('Ymd');
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("syrg_parametro_h",1,$el_row);
if ($prueba_1 > 0) {header("Location:/proyecto/view/configuracion/syrg_parametro_h/index.php");
}else{header("Location:crear.php");}
?>