<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");

$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, adrg_borrador_i1.* FROM adrg_borrador_i1  where destinoid = -1",1,0);
$el_row["abm"]="a";
$el_row["tipodestinoid"]= $_POST['tipodestinoid'];

if ($_POST['tipodestinoid']==1){
    $el_row['personaid_destino']= $_POST['personaid_destino'];
  
}
else {
    
    $el_row['sectorid_destino']= $_POST['sectorid_destino'];
}
session_start();
$el_row["borradorid"]= $_POST['borradorid'];
$el_row["baja"]= 0;
$el_row["usuarioid"]= $_SESSION['usuarioid'];
$el_row["fecharegistro"]= date('Ymd');
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("adrg_borrador_i1",1,$el_row);
if ($prueba_1 > 0) {
    $sql = "SELECT 'm' as abm, adrg_borrador_h.* FROM adrg_borrador_h WHERE borradorid=".$_POST['borradorid'];
    $row_borrador = $db->fcGetSQL($sql,1,2);
    $row_borrador['destino']= 1;
    $prueba_2 = $db->ConfiguracionProcedimientoAlmacenado("adrg_borrador_h",1,$row_borrador);
    header("Location:/proyecto/view/registracion/adrg_borrador_i1/show.php?id=".$db->codificar_valor($_POST['borradorid'],1));
}else{header("Location:create.php");}
?>