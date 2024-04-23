<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/adma_persona_controller.php");
     //$obj = new adma_persona_controller();
     //$obj->actualizar($_POST['personaid'],$_POST['nombre'],$_POST['apellido'],0);
     $obj = new db();
     $row = $obj->fcGetSQL("SELECT 'm' as abm, adma_persona.* FROM adma_persona WHERE personaid =".$_POST['personaid'],1,2);
     //$row["abm"]= "m";
     //$row["personaid"]= $_POST['personaid'];
     $row["nombre"]= $_POST['nombre'];
     $row["apellido"]= $_POST['apellido'];
     $row["baja"]=0;
     //$row["usuarioid"]= 2122;
     $row["fecharegistro"]= date('Ymd');
     $resultado=$obj->ConfiguracionProcedimientoAlmacenado("adma_persona",1,$row);
     //$resultado=$obj->procedimiento_persona("m",$_POST['personaid'],$_POST['nombre'],$_POST['apellido'],0,2311,date('Ymd'));
    if ($resultado > 0) {
          header("Location:show.php?id=".$resultado);
      }else{header("Location:index.php");}
?>