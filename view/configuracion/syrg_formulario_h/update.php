<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $el_row = $obj->fcGetSQL("SELECT 'm' as abm, syrg_formulario_h.* FROM syrg_formulario_h WHERE formularioid =".$_POST['formularioid'],1,2);
     $el_row["abm"]="m";
     $el_row["dtsetid"]=$_POST["dtsetid"];
     $el_row["tipoformulario"]=$_POST["tipoformulario"];
     $el_row["nameformulario"]= $_POST["nameformulario"];
     $el_row["alto"]= $_POST["alto"];
     $el_row["ancho"]= $_POST["ancho"];
     $el_row["unidad_alto"]= $_POST["unidad_alto"];
     $el_row["unidad_ancho"]= $_POST["unidad_ancho"];
     $el_row["reporteid"]= $_POST["reporteid"];
     $el_row["busquedaid"]= $_POST["busquedaid"];
     $el_row["baja"]= 0;
     $el_row["usuarioid"]= 12;
     $el_row["fecharegistro"]= date('Ymd');
     $prueba_1= $obj->ConfiguracionProcedimientoAlmacenado("syrg_formulario_h",1,$el_row);
     if ($prueba_1 > 0) {header("Location:/proyecto/view/configuracion/syrg_formulario_h/show.php?id=".$obj->codificar_valor($_POST["formularioid"],1));
     }else{header("Location:crear.php");}
     ?>