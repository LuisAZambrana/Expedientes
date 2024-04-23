<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/adma_persona_controller.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     //$obj = new adma_persona_controller();
     //$obj->borrar($_GET['id']);
     $obj = new db();
     $row = $obj->fcgetSql("SELECT 'm' as abm, adma_persona.* from adma_persona where personaid =".$_GET['id'],1,2);
     $row["baja"]=1;
     $row["usuarioid"]= 2122;
     $row["fecharegistro"]= date('Ymd');
     $resultado=$obj->ConfiguracionProcedimientoAlmacenado("adma_persona",1,$row);
     //$resultado=$obj->procedimiento_persona("m",$_POST['personaid'],$_POST['nombre'],$_POST['apellido'],0,2311,date('Ymd'));
     if ($resultado > 0) {
          header("Location:/proyecto/index.php#personas");
      }else{header("Location:show.php?id=".$resultado);}
?>