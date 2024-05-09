<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");

$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, adrg_borrador_i2.* FROM adrg_borrador_i2  where origenid = -1",1,0);
$el_row["abm"]="a";
$el_row['tipo_origen']=$_POST['tipo_origen'];
session_start();
if ($_POST['tipo_origen']==1){
    $el_row['personaid_origen']= $_SESSION["usuarioid"];
  
}
else {
    
    $el_row['sectorid_origen']= $_POST['sectorid_origen'];
}

$el_row["borradorid"]= $_POST['borradorid'];
$el_row["baja"]= 0;

$row["usuarioid"]=  $_SESSION["usuarioid"];
$el_row["fecharegistro"]= date('Ymd');
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("adrg_borrador_i2",1,$el_row);
if ($prueba_1 > 0) {
    $sql = "SELECT 'm' as abm, adrg_borrador_h.* FROM adrg_borrador_h WHERE borradorid=".$_POST['borradorid'];
    $row_borrador = $db->fcGetSQL($sql,1,2);
    $row_borrador['origen']= 1;
    $prueba_2 = $db->ConfiguracionProcedimientoAlmacenado("adrg_borrador_h",1,$row_borrador);
    header("Location:/proyecto/view/registracion/adrg_borrador_i2/show.php?id=".$db->codificar_valor($_POST['borradorid'],1));
}else{header("Location:create.php");}
?>