<?php
   require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $conexion = new db();
    //$_POST['borradorid']= $conexion->codificar_valor($_GET['borradorid'],0);
    $sql="SELECT * FROM adrg_expediente_h where baja = 0 and borradorid=".$_POST['borradorid'];
    $row = $conexion->fcGetSQL($sql,1,0);

    if ($row) {
        header("Location:index.php");
    }
    else{
        $sql = "SELECT 'a' as abm, adrg_expediente_h.* FROM adrg_expediente_h where borradorid= -1";
        $row = $conexion->fcGetSQL($sql,1,0);
        $row['abm']= 'a';
        $row['borradorid']= $_POST['borradorid'];
        $row['fecha_creacion']= date('YmdHis');
        $row['importanciaid']= $_POST['importanciaid'];
        $row['descripcion']= $_POST['descripcion'];
        $row['nro_expendiente']= '0001-00000001';
        $row['sectorid']= 2;
        $row['estadoid']= 1;
        $row["baja"]= 0;
        session_start();
        $row["usuarioid"]=  $_SESSION["usuarioid"];
        $row["fecharegistro"]= date('Ymd');
        $idconexion = $conexion->ConfiguracionProcedimientoAlmacenado('adrg_expediente_h',1,$row);
        if  ($idconexion > 0) {
                header("Location:index.php");
        }
    }


?>