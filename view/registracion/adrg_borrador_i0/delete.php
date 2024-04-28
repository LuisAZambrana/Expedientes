<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $row = $obj->fcgetSql("SELECT 'm' as abm, adrg_borrador_i0.* from adrg_borrador_i0 where borradorid =".$_GET['id'],1,2);
     $row["baja"]=1;
     $row["archivo"]="Sin Datos";
     $row["usuarioid"]= 2122;
     $row["fecharegistro"]= date('Ymd');
     $resultado=$obj->ConfiguracionProcedimientoAlmacenado("adrg_borrador_i0",1,$row);
     //$resultado=$obj->procedimiento_persona("m",$_POST['personaid'],$_POST['nombre'],$_POST['apellido'],0,2311,date('Ymd'));
     if ($resultado > 0) {
          header("Location:/proyecto/view/registracion/adrg_borrador_h/show.php?id=".$row['borradorid']);
      }else{header("Location:show.php?id=".$resultado);}
?>