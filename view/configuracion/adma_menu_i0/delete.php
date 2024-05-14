<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $_GET['id']= $obj->codificar_valor($_GET['id'],0);
     $row = $obj->fcgetSql("SELECT 'm' as abm, adma_menu_i0.* from adma_menu_i0 where  itemmenuid =".$_GET['id'],1,2);
     $row["baja"]=1;
     $row["usuarioid"]= 2122;
     $row["fecharegistro"]= date('Ymd');
     $resultado=$obj->ConfiguracionProcedimientoAlmacenado("adma_menu_i0",1,$row);
     //$resultado=$obj->procedimiento_persona("m",$_POST['personaid'],$_POST['nombre'],$_POST['apellido'],0,2311,date('Ymd'));
     if ($resultado > 0) {
          header("Location:/proyecto/view/configuracion/adma_menu_i0/index.php?id=".$row['menuid']);
      }else{header("Location:show.php?id=".$obj->codificar_valor($resultado,1));}
?>