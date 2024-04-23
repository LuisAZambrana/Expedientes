<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $el_row = $obj->fcGetSQL("SELECT 'm' as abm, syma_grilla_h.* FROM syma_grilla_h WHERE grillaid =".$_POST['grillaid'],1,2);
   
     $el_row["grillaid"]=$_POST["grillaid"];
     $el_row["tipoconsultaid"]=$_POST["tipoconsultaid"];
     $el_row["keyfieldname"]= $_POST["keyfieldname"];
     $el_row["tabla"]= $_POST["tabla"];
     $el_row["querys"]= $_POST["querys"];
     $el_row["showgroupedcolumns"]= isset($_POST["showgroupedcolumns"])? $_POST["showgroupedcolumns"] : 0 ;
     $el_row["showgrouppanel"]= isset($_POST["showgrouppanel"])? $_POST["showgrouppanel"] : 0;
     $el_row["showautofilterrow"]= isset($_POST["showautofilterrow"])? $_POST["showautofilterrow"] : 0 ;
     $el_row["grupo"]= $_POST["grupo"];
     $el_row["showsession"]= isset($_POST["showsession"]) ? $_POST["showsession"] : 0;
     $el_row["showsector"]= isset($_POST["showsector"]) ? $_POST["showsector"] : 0;
     $el_row["baja"]= 0;
     $el_row["usuarioid"]= 12;
     $el_row["fecharegistro"]= date('Ymd');

     $resultado=$obj->ConfiguracionProcedimientoAlmacenado("syma_grilla_h",1,$el_row);
    if ($resultado > 0) {
          header("Location:show.php?id=".$_POST["grillaid"]);
      }else{header("Location:index.php");}
?>