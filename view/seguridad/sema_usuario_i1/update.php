<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $el_row = $obj->fcGetSQL("SELECT 'm' as abm, sema_usuario_i0.* FROM sema_usuario_i1 WHERE perteneceid =".$_POST['listaitemid'],1,2);
     $el_row["abm"]="m";
     $el_row["sectorid"]=$_POST["sectorid"];
     $el_row["activo"]=  isset($_POST["activo"])? $_POST["activo"]:0;
     $el_row["baja"]= 0;
     $el_row["usuarioid"]= 12;
     $el_row["fecharegistro"]= date('Ymd');
     $prueba_1= $obj->ConfiguracionProcedimientoAlmacenado("sema_usuario_i1",1,$el_row);
     if ($prueba_1 > 0) {header("Location:index.php?id=". $obj->codificar_valor($_POST["personaid"],1));
     }else{header("Location:crear.php?id=".$ob->codificar_valor($_POST["personaid"],1));}
     ?>