<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $row = $obj->fcgetSql("SELECT 'm' as abm, adrg_borrador_h.* from adrg_borrador_h where borradorid =".$_GET['id'],1,2);
     $row["baja"]=1;
     session_start();
     $row["usuarioid"]= $_SESSION['usuarioid'];
     $row["fecharegistro"]= date('Ymd');
     $resultado=$obj->ConfiguracionProcedimientoAlmacenado("adrg_borrador_h",1,$row);

     if ($resultado > 0) {
          header("Location:/proyecto/view/registracion/adrg_borrador_h/index.php?id=".$row['borradorid']);
      }else{header("Location:show.php?id=".$resultado);}
?>