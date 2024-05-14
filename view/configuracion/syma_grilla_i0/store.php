<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");

$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, syma_grilla_i0.* FROM syma_grilla_i0  where itemid = -1",1,0);
$el_row["abm"]="a";
$el_row["grillaid"]=$_POST["grillaid"];
$el_row["caption"]=$_POST["caption"];
$el_row["tooltip"]= $_POST["tooltip"];
$el_row["visible"]=  isset($_POST["visible"])? $_POST["visible"]:0;
$el_row["visibleindex"]= $_POST["visibleindex"];
$el_row["width"]= $_POST["width"];
$el_row["groupindex"]= $_POST["groupindex"];
$el_row["fieldname"]= $_POST["fieldname"];
$el_row["combolistaid"]= $_POST["combolistaid"];
$el_row["html"]=  isset($_POST["html"])? $_POST["html"]:0;
$el_row["tienecondicion"]=  isset($_POST["tienecondicion"])? $_POST["tienecondicion"]:0;
$el_row["condicion"]= $_POST["condicion"];
$el_row["imagen"]= isset($_POST["imagen"])? $_POST["imagen"]:0;
$el_row["url_imagen"]= $_POST["url_imagen"];
$el_row["campoimagen"]= isset($_POST["campoimagen"])? $_POST["campoimagen"]:0;
$el_row["hiperlink"]=  isset($_POST["hiperlink"])? $_POST["hiperlink"]:0;
$el_row["priority"]= $_POST["priority"];
$el_row["parametro"]= isset($_POST["parametro"])? $_POST["parametro"]:0;
$el_row["nombresesion"]= $_POST["nombresesion"];
$el_row["baja"]= 0;
$el_row["usuarioid"]= 12;
$el_row["fecharegistro"]= date('Ymd');
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("syma_grilla_i0",1,$el_row);
if ($prueba_1 > 0) {header("Location:index.php?id=".$db->codificar_valor($_POST["grillaid"],1));
}else{header("Location:crear.php");}
?>