<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $el_row = $obj->fcGetSQL("SELECT 'm' as abm, serg_permisos_h.* FROM serg_permisos_h WHERE permisoid =".$_POST['permisoid'],1,2);
     $el_row["abm"]="m";
     $el_row["objetoid"]=$_POST["objetoid"];
     $el_row["rolid"]=$_POST["rolid"];
     $el_row["accionid"]=$_POST["accionid"];
     $el_row["activo"]= isset($_POST["activo"])?$_POST["activo"]:0;
     $el_row["baja"]= 0;
     $el_row["usuarioid"]= 12;
     $el_row["fecharegistro"]= date('Ymd');
     $prueba_1= $obj->ConfiguracionProcedimientoAlmacenado("serg_permisos_h",1,$el_row);
     if ($prueba_1 > 0) {header("Location:/proyecto/view/seguridad/serg_permisos_h/show.php?id=".$_POST["permisoid"]);
     }else{header("Location:crear.php");}
     ?>