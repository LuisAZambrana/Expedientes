<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");

$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, adrg_borrador_h.* FROM adrg_borrador_h  where borradorid = -1",1,0);
if (isset($_GET['id'])){
    $_GET['id']= $obj->codificar_valor( $_GET['id'],0);
}
$el_row["abm"]="a";
$el_row["expedienteid"]=0;
$el_row["asunto"]=$_POST["asunto"];
$el_row["cuerpo"]=$_POST["cuerpo"];
$el_row["fecha_creacion"]= date('YmdHis');
$el_row["estadoid"]=1;
$el_row["baja"]= 0;
session_start();
$el_row["usuarioid"]= $_SESSION['usuarioid'];
$el_row["fecharegistro"]= date('Ymd');
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("adrg_borrador_h",1,$el_row);
if ($prueba_1 > 0) {header("Location:/proyecto/view/registracion/adrg_borrador_h/show.php?id=".$db->codificar_valor( $prueba_1,1));
}else{header("Location:crear.php");}
?>