<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $el_row = $obj->fcGetSQL("SELECT 'm' as abm, syrg_lista_i0.* FROM syrg_lista_i0 WHERE listaitemid =".$_POST['listaitemid'],1,2);
     $el_row["abm"]="m";
     $el_row["listaid"]=$_POST["listaid"];
     $el_row["campoid"]=$_POST["campoid"];
     $el_row["caption"]= $_POST["caption"];
     $el_row["width"]= $_POST["width"];
     $el_row["visible"]=  isset($_POST["visible"])? $_POST["visible"]:0;
     $el_row["valuemember"]=isset($_POST["valuemember"])? $_POST["valuemember"]:0;
     $el_row["displaymember"]= isset($_POST["displaymember"])? $_POST["displaymember"]:0;
     $el_row["baja"]= 0;
     $el_row["usuarioid"]= 12;
     $el_row["fecharegistro"]= date('Ymd');
     $prueba_1= $obj->ConfiguracionProcedimientoAlmacenado("syrg_lista_i0",1,$el_row);
     if ($prueba_1 > 0) {header("Location:index.php?id=".$_POST["listaid"]);
     }else{header("Location:crear.php?id=".$_POST["listaid"]);}
     ?>