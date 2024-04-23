<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $el_row = $obj->fcGetSQL("SELECT 'm' as abm, adma_sector.* FROM adma_sector WHERE sectorid =".$_POST['sectorid'],1,2);
     $el_row["abm"]="m";
     $el_row["sectords"]=$_POST["sectords"];
     $el_row["tiposectorid"]=$_POST["tiposectorid"];
     $el_row["activo"]= isset($_POST["activo"])? $_POST["activo"]:0;
     $el_row["baja"]= 0;
     $el_row["usuarioid"]= 12;
     $el_row["fecharegistro"]= date('Ymd');
     $prueba_1= $obj->ConfiguracionProcedimientoAlmacenado("adma_sector",1,$el_row);
     if ($prueba_1 > 0) {header("Location:/proyecto/view/maestros/adma_sector/show.php?id=".$_POST["sectorid"]);
     }else{header("Location:crear.php");}
     ?>