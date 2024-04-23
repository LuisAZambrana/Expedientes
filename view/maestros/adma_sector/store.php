<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");

$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, adma_sector.* FROM adma_sector  where sectorid = -1",1,0);
$el_row["abm"]="a";
$el_row["sectords"]=$_POST["sectords"];
$el_row["tiposectorid"]=$_POST["tiposectorid"];
$el_row["activo"]= isset($_POST["activo"])? $_POST["activo"]:0;
$el_row["baja"]= 0;
$el_row["usuarioid"]= 12;
$el_row["fecharegistro"]= date('Ymd');
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("adma_sector",1,$el_row);
if ($prueba_1 > 0) {header("Location:/proyecto/view/maestros/adma_sector/index.php");
}else{header("Location:crear.php");}
?>