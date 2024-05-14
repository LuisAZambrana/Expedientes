<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");

$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, syma_grilla_h.* FROM syma_grilla_h  where id = -1",1,0);
$el_row["abm"]="a";
$el_row["grillaid"]=$_POST["grillaid"];
$el_row["tipoconsultaid"]=$_POST["tipoconsultaid"];
$el_row["keyfieldname"]= $_POST["keyfieldname"];
$el_row["tabla"]= $_POST["tabla"];
$el_row["querys"]= $_POST["querys"];
$el_row["showgroupedcolumns"]= isset($_POST["showgroupedcolumns"])?$_POST["showgroupedcolumns"]:0;
$el_row["showgrouppanel"]= isset($_POST["showgrouppanel"])?$_POST["showgrouppanel"]:0;
$el_row["showautofilterrow"]= isset($_POST["showautofilterrow"])?$_POST["showautofilterrow"]:0;
$el_row["grupo"]= $_POST["grupo"];
$el_row["showsession"]= isset($_POST["showsession"])?$_POST["showsession"]:0;
$el_row["showsector"]= isset($_POST["showsector"])?$_POST["showsector"]:0;
$el_row["baja"]= 0;
$el_row["usuarioid"]= 12;
$el_row["fecharegistro"]= date('Ymd');
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("syma_grilla_h",1,$el_row);
if ($prueba_1 > 0) {
    header("Location:show.php?id=".$db->codificar_valor($_POST["grillaid"],1));
}else{header("Location:create.php");}
?>