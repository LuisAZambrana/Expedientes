<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new db();
     $el_row = $obj->fcGetSQL("SELECT 'm' as abm, adrg_borrador_i1.* FROM adrg_borrador_i1 WHERE destinoid =".$_POST['destinoid'],1,2);
     $el_row["abm"]="a";
     $el_row["tipodestinoid"]= $_POST['tipodestinoid'];
     $el_row["personaid_destino"]= $_POST['personaid_destino'];
     $el_row["sectorid_destino"]= $_POST['sectorid_destino'];
     $el_row["borradorid"]= $_POST['borradorid'];
     $el_row["baja"]= 0;
     session_start();
     $el_row["usuarioid"]= $_SESSION['usuarioid'];
     $el_row["fecharegistro"]= date('Ymd');
     $prueba_1= $obj->ConfiguracionProcedimientoAlmacenado("adrg_borrador_i1",1,$el_row);
     if ($prueba_1 > 0) {header("Location:/proyecto/view/registracion/adrg_borrador_i1/show.php?id=".$obj->codificar_valor($_POST["borradorid"],1));
     }else{header("Location:crear.php");}
     ?>