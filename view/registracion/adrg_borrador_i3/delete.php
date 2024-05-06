<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $_GET['id'] = $obj->codificar_valor($_GET['id'],0);
     $row = $obj->fcgetSql("SELECT 'm' as abm, adrg_borrador_i3.* from adrg_borrador_i3 where borradorid =".$_GET['id'],1,2);
     $row["baja"]=1;
     $row["foto"]="Sin Datos";
     session_start();
     $row["usuarioid"]=  $_SESSION["usuarioid"];
     $row["fecharegistro"]= date('Ymd');
     $resultado=$obj->ConfiguracionProcedimientoAlmacenado("adrg_borrador_i3",1,$row);
     if ($resultado > 0) {
          header("Location:/proyecto/view/registracion/adrg_borrador_h/show.php?id=".$obj->codificar_valor($row['borradorid'],1));
      }else{header("Location:show.php?id=".$resultado);}
?>