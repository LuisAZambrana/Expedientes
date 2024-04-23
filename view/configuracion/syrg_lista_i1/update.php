<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $el_row = $obj->fcGetSQL("SELECT 'm' as abm, syrg_lista_i1.* FROM syrg_lista_i1  where listaitemid =".$_POST['listaitemid'],1,2);
     $el_row["abm"]="m";
     $el_row["listaid"]=$_POST["listaid"];
     $el_row["valuemember"]=$_POST["valuemember"];
     $el_row["displaymember"]= $_POST["displaymember"];
     $el_row["predeterminado"]=  isset($_POST["predeterminado"])? $_POST["predeterminado"]:0;
     $el_row["imagen"]= $_POST["imagen"];
     $el_row["baja"]= 0;
     $el_row["usuarioid"]= 12;
     $el_row["fecharegistro"]= date('Ymd');
     $prueba_1=  $obj->ConfiguracionProcedimientoAlmacenado("syrg_lista_i1",1,$el_row);
     if ($prueba_1 > 0) {header("Location:index.php?id=".$_POST["listaid"]);
     }else{header("Location:crear.php?id=".$_POST["listaid"]);}
     ?>