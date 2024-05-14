<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");

$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, sema_usuario_i1.* FROM sema_usuario_i1  where perteneceid = -1",1,0);
$el_row["abm"]="a";
$el_row["personaid"]=$_POST["personaid"];
$el_row["sectorid"]=$_POST["sectorid"];
$el_row["activo"]=  isset($_POST["activo"])? $_POST["activo"]:0;
$el_row["baja"]= 0;
$el_row["usuarioid"]= 12;
$el_row["fecharegistro"]= date('Ymd');
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("sema_usuario_i1",1,$el_row);
if ($prueba_1 > 0) {header("Location:index.php?id=".$db->codificar_valor($_POST["personaid"],1));}
else{
    header("Location:crear.php?id=".$db->codificar_valor($_POST["personaid"],1));
}
?>