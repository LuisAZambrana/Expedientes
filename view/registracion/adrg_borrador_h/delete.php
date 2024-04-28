<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $row = $obj->fcgetSql("SELECT 'm' as abm, adma_sector.* from adma_sector where sectorid =".$_GET['id'],1,2);
     $row["baja"]=1;
     $row["usuarioid"]= 2122;
     $row["fecharegistro"]= date('Ymd');
     $resultado=$obj->ConfiguracionProcedimientoAlmacenado("adma_sector",1,$row);

     if ($resultado > 0) {
          header("Location:/proyecto/view/maestros/adma_sector/index.php?id=".$row['sectorid']);
      }else{header("Location:show.php?id=".$resultado);}
?>