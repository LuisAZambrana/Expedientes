<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $el_row = $obj->fcGetSQL("SELECT 'm' as abm, sema_rol_h.* FROM sema_rol_h WHERE rolid =".$_POST['rolid'],1,2);
     $el_row["abm"]="m";
     $el_row["rolds"]=$_POST["rolds"];
     $el_row["activo"]= isset($_POST["activo"])?$_POST["activo"]:0;
     $el_row["baja"]= 0;
     $el_row["usuarioid"]= 12;
     $el_row["fecharegistro"]= date('Ymd');
     $prueba_1= $obj->ConfiguracionProcedimientoAlmacenado("sema_rol_h",1,$el_row);
     if ($prueba_1 > 0) {header("Location:/proyecto/view/seguridad/sema_rol_h/show.php?id=".$_POST["rolid"]);
     }else{header("Location:crear.php");}
     ?>