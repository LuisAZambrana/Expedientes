<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
      $db = new db();
      //deberiamos controlar por borradorid que existan todos las cargas necesarias...
      $sql = "SELECT * from adrg_borrador_h where borradorid = ". $db->codificar_valor($_GET['id'],0);
      $row_borrador = $db->fcGetSQL($sql,1,2);
     
      $generacion_expediente = 1;
      $mensaje_err='';

      if ($row_borrador['adjunto']== 0) {
        $generacion_expediente  = 0;
        $mensaje_err.= 'No cargo ningun Adjunto! - '; 
      } 
    
      if ($row_borrador['origen']== 0) {
        $generacion_expediente  = 0;
        $mensaje_err.= 'No cargo ningun Origen! -'; 
       } 
     
      if ($row_borrador['destino']== 0) {
        $generacion_expediente  = 0;
         $mensaje_err.= 'No cargo ningun Destino! -';
         } 

         if ($row_borrador['persona']== 0) {
        
           $mensaje_err.= 'El Expediente a generar no tiene ninguna Persona Externa cargada!... Si el Expediente es interno puede continuar con la generación del mismo!';
           } 
  
    
       if ($generacion_expediente == 0){
            header("Location:resultado_final.php?borradorid=".$_GET['id']."&mess=".$mensaje_err,1);
           
        }else {
            if ($row_borrador['persona']== 1){
                header("Location:menu.php?id=".$_GET['id']);
            }
            else
            {
                header("Location:menu.php?id=".$_GET['id']."&mess=".$mensaje_err);
            }
           
        }



?>