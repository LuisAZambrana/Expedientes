<?php
   require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
   $db = new db();
   $_valorid= $db->codificar_valor($_GET['id'],0);
   $el_row = $db->fcGetSQL("SELECT adrg_borrador_i0.* FROM adrg_borrador_i0  where embebidoid = ".$_valorid,1,2);
    require_once ($_SERVER['DOCUMENT_ROOT']."/proyecto/reporte_administrador/dompdf/vendor/autoload.php");
    $certificate= $el_row['archivo'];
    $tipo= $el_row['tipo_archivo'];
    $nombre_origen = $el_row['nombre_origen'];
    header("Content-Disposition: attachment; filename=\"$nombre_origen\"");
    echo $certificate;

?>