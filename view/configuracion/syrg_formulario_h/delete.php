<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $row = $obj->fcgetSql("SELECT 'm' as abm, syrg_formulario_h.* from syrg_formulario_h where formularioid =".$_GET['id'],1,2);
     $row["baja"]=1;
     $row["usuarioid"]= 2122;
     $row["fecharegistro"]= date('Ymd');
     $resultado=$obj->ConfiguracionProcedimientoAlmacenado("syrg_formulario_h",1,$row);
     //$resultado=$obj->procedimiento_persona("m",$_POST['personaid'],$_POST['nombre'],$_POST['apellido'],0,2311,date('Ymd'));
     if ($resultado > 0) {
          header("Location:/proyecto/view/configuracion/syrg_formulario_h/index.php?id=".$row['formularioid']);
      }else{header("Location:show.php?id=".$resultado);}
?>