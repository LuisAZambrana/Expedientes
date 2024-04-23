<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $row = $obj->fcgetSql("SELECT 'm' as abm, sema_rol_h.* from sema_rol_h where rolid =".$_GET['id'],1,2);
     $row["baja"]=1;
     $row["usuarioid"]= 2122;
     $row["fecharegistro"]= date('Ymd');
     $resultado=$obj->ConfiguracionProcedimientoAlmacenado("sema_rol_h",1,$row);
     //$resultado=$obj->procedimiento_persona("m",$_POST['personaid'],$_POST['nombre'],$_POST['apellido'],0,2311,date('Ymd'));
     if ($resultado > 0) {
          header("Location:/proyecto/view/seguridad/sema_rol_h/index.php?id=".$row['rolid']);
      }else{header("Location:show.php?id=".$resultado);}
?>