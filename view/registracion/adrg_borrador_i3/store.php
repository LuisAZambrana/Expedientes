<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");

$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, adrg_borrador_i3.* FROM adrg_borrador_i3  where adjuntoid = -1",1,0);
$el_row["abm"]="a";


if ($_FILES['foto']['tmp_name']){   
    $binario_nombre_temporal = $_FILES['foto']['tmp_name'];
    $binario_nombre = $_FILES['foto']['name'];
    $binario_contenido= file_get_contents( $binario_nombre_temporal);
    //$binario_contenido = addslashes(fread(fopen($binario_nombre_temporal, "rb"), filesize($binario_nombre_temporal)));
    //$_POST['archivo']= $binario_contenido;
    $binario_tipo=$_FILES['foto']['type'];
}

$el_row["nombre"]= $_POST['nombre'];
$el_row["apellido"]= $_POST['apellido'];
$el_row["tipoidentificacionid"]= $_POST['tipoidentificacionid'];
$el_row["identificacionid"]= $_POST['identificacionid'];
$el_row["cuil"]= $_POST['cuil'];
$el_row["telefono"]= $_POST['telefono'];
$el_row["direccion"]= $_POST['direccion'];
$el_row["email"]= $_POST['email'];
$el_row["foto"]= $binario_contenido;
$el_row["tipo_archivo"]= $binario_tipo;
$el_row["borradorid"]= $_POST['borradorid'];
$el_row["baja"]= 0;
session_start();
$el_row["usuarioid"]= $_SESSION['usuarioid'];
$el_row["fecharegistro"]= date('Ymd');
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("adrg_borrador_i3",1,$el_row);
if ($prueba_1 > 0) {header("Location:/proyecto/view/registracion/adrg_borrador_i3/show.php?id=".$db->codificar_valor($_POST['borradorid'],1));
}else{header("Location:create.php");}
?>