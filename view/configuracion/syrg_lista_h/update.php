<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $el_row = $obj->fcGetSQL("SELECT 'm' as abm, syrg_lista_h.* FROM syrg_lista_h WHERE listaid =".$_POST['listaid'],1,2);
     $el_row["abm"]="m";
     $el_row["listaid"]=$_POST["listaid"];
     $el_row["listads"]=$_POST["listads"];
     $el_row["recordsource"]= $_POST["recordsource"];
     $el_row["listafija"]=  isset($_POST["listafija"])? $_POST["listafija"]:0;
     $el_row["tipoconsultaid"]= $_POST["tipoconsultaid"];
     $el_row["tipodatovaluemember"]= $_POST["tipodatovaluemember"];
     $el_row["imagen"]= isset($_POST["imagen"])? $_POST["imagen"]:0;
     $el_row["grupo"]= $_POST["grupo"];
     $el_row["baja"]= 0;
     $el_row["usuarioid"]= 12;
     $el_row["fecharegistro"]= date('Ymd');
     $prueba_1= $obj ->ConfiguracionProcedimientoAlmacenado("syrg_lista_h",1,$el_row);
     if ($prueba_1 > 0) {header("Location:/proyecto/view/configuracion/syrg_lista_i0/show.php?id=".$_POST["listaid"]);
     }else{header("Location:crear.php");}
     ?>