<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");

$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, adrg_borrador_i1.* FROM adrg_borrador_i1  where destinoid = -1",1,0);
$el_row["abm"]="a";
$el_row["tipodestinoid"]= $_POST['tipodestinoid'];
$el_row["personaid_destino"]= $_POST['personaid_destino'];
$el_row["sectorid_destino"]= $_POST['sectorid_destino'];
$el_row["borradorid"]= $_POST['borradorid'];
$el_row["baja"]= 0;
$el_row["usuarioid"]= 12;
$el_row["fecharegistro"]= date('Ymd');
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("adrg_borrador_i1",1,$el_row);
if ($prueba_1 > 0) {header("Location:/proyecto/view/registracion/adrg_borrador_i1/show.php?id=".$_POST['borradorid']);
}else{header("Location:create.php");}
?>