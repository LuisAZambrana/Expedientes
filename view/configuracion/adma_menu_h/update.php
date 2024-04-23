<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $el_row = $obj->fcGetSQL("SELECT 'm' as abm, adma_menu_h.* FROM adma_menu_h WHERE menuhorizontalid =".$_POST['menuhorizontalid'],1,2);
     $el_row["abm"]="m";
     $el_row["nombremenuds"]=$_POST["nombremenuds"];
     $el_row["nombregeneral"]=$_POST["nombregeneral"];
     $el_row["imagenurl"]= $_POST["imagenurl"];
     $el_row["tipomenu"]= $_POST["tipomenu"];
     $el_row["activo"]=  isset($_POST["activo"])? $_POST["activo"]:0;
     $el_row["menuprincipal"]= isset($_POST["menuprincipal"])? $_POST["menuprincipal"]:0;
     $el_row["frontend"]= isset($_POST["frontend"])? $_POST["frontend"]:0;
     $el_row["backend"]= isset($_POST["backend"])? $_POST["backend"]:0;
     $el_row["baja"]= 0;
     $el_row["usuarioid"]= 12;
     $el_row["fecharegistro"]= date('Ymd');
     $prueba_1= $obj ->ConfiguracionProcedimientoAlmacenado("adma_menu_h",1,$el_row);
     if ($prueba_1 > 0) {header("Location:/proyecto/view/configuracion/adma_menu_h/show.php?id=".$_POST["menuhorizontalid"]);
     }else{header("Location:crear.php");}
     ?>