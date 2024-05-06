<?php
   require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
   $db = new db();
   $_GET['id']= $db->codificar_valor($_GET['id'],0);
   $el_row = $db->fcGetSQL("SELECT adrg_borrador_i0.* FROM adrg_borrador_i0  where embebidoid = ".$_GET['id'],1,2);
    require_once ($_SERVER['DOCUMENT_ROOT']."/proyecto/reporte_administrador/dompdf/vendor/autoload.php");
    //use Dompdf\Dompdf;
   /* $dompdf= new Dompdf();
    $options= $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf ->setOptions($options);
    $dompdf->loadDOM($el_row['archivo']);
    $dompdf->setPaper('A4');
    $dompdf->render(); 
    $dompdf ->stream("archivo.pdf", array("Attachment" => false));    */

    $certificate= $el_row['archivo'];
    $tipo= $el_row['tipo_archivo'];
    header("Content-type: $tipo");
    echo $certificate;
    
    /*require_once ($_SERVER['DOCUMENT_ROOT']."/proyecto/reporte_administrador/dompdf/vendor/autoload.php");
    use Dompdf\Dompdf;
    $dompdf= new Dompdf();
    $options= $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf ->setOptions($options);
    $dompdf->loadHtml($certificate);
    $dompdf->setPaper('A4');
    $dompdf->render(); 
    $dompdf ->stream("archivo.pdf", array("Attachment" => false));   */    
      

?>