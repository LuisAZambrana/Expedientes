<?php
   require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
   $db = new db();
   $_GET['id']= $db->codificar_valor($_GET['id'],0);
   $el_row = $db->fcGetSQL("SELECT adrg_expediente_i1.* FROM adrg_expediente_i1  where finalizarid = ".$_GET['id'],1,2);
    require_once ($_SERVER['DOCUMENT_ROOT']."/proyecto/reporte_administrador/dompdf/vendor/autoload.php");

    $certificate= $el_row['archivo'];
    $tipo= $el_row['tipo_archivo'];
    header("Content-type: $tipo");

if ($tipo == 'application/pdf'){
    $extencion = '.pdf';} else { $extencion= '.jpg';}
    $nombre_origen = 'respuesta_expediente'. $extencion;
    header("Content-Disposition: attachment; filename=\"$nombre_origen\"");
    echo $certificate;

?>