<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");

$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, adrg_borrador_i0.* FROM adrg_borrador_i0  where embebidoid = -1",1,0);
$el_row["abm"]="a";


if ($_FILES['archivo']['tmp_name']){   
    $binario_nombre_temporal = $_FILES['archivo']['tmp_name'];
    $binario_nombre = $_FILES['archivo']['name'];
    $binario_contenido= file_get_contents( $binario_nombre_temporal);
    //$binario_contenido = addslashes(fread(fopen($binario_nombre_temporal, "rb"), filesize($binario_nombre_temporal)));
    //$_POST['archivo']= $binario_contenido;
    $binario_tipo=$_FILES['archivo']['type'];
}

$el_row["nombre_archivo"]= $_POST['nombre_archivo'];
$el_row["archivo"]= $binario_contenido;
$el_row["nombre_origen"]= $binario_nombre;
$el_row["tipo_archivo"]= $binario_tipo;
$el_row["borradorid"]= $_POST['borradorid'];
$el_row["baja"]= 0;
$el_row["usuarioid"]= 12;
$el_row["fecharegistro"]= date('Ymd');
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("adrg_borrador_i0",1,$el_row);
if ($prueba_1 > 0) {header("Location:/proyecto/view/registracion/adrg_borrador_i0/show.php?id=".$_POST['borradorid']);
}else{header("Location:create.php");}
?>