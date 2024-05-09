<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $el_row = $obj->fcGetSQL("SELECT 'm' as abm, sema_objeto_h.* FROM sema_objeto_h WHERE objetoid =".$_POST['objetoid'],1,2);
     $el_row["abm"]="m";
     $el_row["tipoobjetoid"]=$_POST["tipoobjetoid"];
     $el_row["nombreobjetods"]=$_POST["nombreobjetods"];
     $el_row["formularioid"]= $_POST["formularioid"];
     $el_row["menuid"]= $_POST["menuid"];
     $el_row["baja"]= 0;
     session_start();
     $el_row["usuarioid"]= $_SESSION['usuarioid'];
     $el_row["fecharegistro"]= date('Ymd');
     $prueba_1= $obj->ConfiguracionProcedimientoAlmacenado("adrg_borrador_i0",1,$el_row);
     if ($prueba_1 > 0) {
          $sql = "SELECT 'm' as abm, adrg_borrador_h.* FROM adrg_borrador_h WHERE borradorid=".$_POST['borradorid'];
          $row_borrador = $db->fcGetSQL($sql,1,2);
          $row_borrador['adjunto']= 1;
          $prueba_2 = $db->ConfiguracionProcedimientoAlmacenado("adrg_borrador_h",1,$row_borrador);
          header("Location:/proyecto/view/seguridad/sema_objeto_h/show.php?id=".$obj->codificar_valor($_POST["menuid"],1));
     }else{header("Location:crear.php");}
     ?>
     