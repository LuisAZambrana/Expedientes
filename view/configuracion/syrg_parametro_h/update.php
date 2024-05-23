<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $el_row = $obj->fcGetSQL("SELECT 'm' as abm, syrg_parametro_h.* FROM syrg_parametro_h WHERE parametroid =".$_POST['parametroid'],1,2);
     $el_row["abm"]="m";
     $el_row["parametrods"]=$_POST["parametrods"];
     $el_row["valor"]=$_POST["valor"];
     $el_row["baja"]= 0;
     $el_row["usuarioid"]= 12;
     $el_row["fecharegistro"]= date('Ymd');
     $prueba_1= $obj->ConfiguracionProcedimientoAlmacenado("syrg_parametro_h",1,$el_row);
     if ($prueba_1 > 0) {header("Location:/proyecto/view/configuracion/syrg_parametro_h/show.php?id=".$obj->codificar_valor($_POST["parametroid"],1));
     }else{header("Location:crear.php");}
     ?>