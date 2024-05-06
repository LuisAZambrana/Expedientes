<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $_GET['id']= $obj->codificar_valor( $_GET['id'],0);
     $row = $obj->fcgetSql("SELECT 'm' as abm, adrg_borrador_i0.* from adrg_borrador_i0 where borradorid =".$_GET['id'],1,2);
     $row["baja"]=1;
     $row["archivo"]="Sin Datos";
     session_start();
     $row["usuarioid"]= $_SESSION['usuarioid'];
     $row["fecharegistro"]= date('Ymd');
     $resultado=$obj->ConfiguracionProcedimientoAlmacenado("adrg_borrador_i0",1,$row);
     //$resultado=$obj->procedimiento_persona("m",$_POST['personaid'],$_POST['nombre'],$_POST['apellido'],0,2311,date('Ymd'));
     if ($resultado > 0) {
          header("Location:/proyecto/view/registracion/adrg_borrador_h/show.php?id=".$obj->codificar_valor( $row['borradorid'],1));
      }else{header("Location:show.php?id=".$obj->codificar_valor($resultado,1));}
?>
