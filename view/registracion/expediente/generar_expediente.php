<?php
   require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $conexion = new db();
    $sql="SELECT * FROM adrg_expediente_h where baja = 0 and borradorid=".$_GET['id'];
    $row = $conexion->fcGetSQL($sql,1,0);

    if ($row) {
        header("Location:index.php");
    }
    else{
        $sql = "SELECT 'a' as abm, adrg_expediente_h.* FROM adrg_expediente_h where borradorid= -1";
        $row = $conexion->fcGetSQL($sql,1,0);
        $row['abm']= 'a';
        $row['borradorid']= $_GET['id'];
        $row['fecha_creacion']= date('YmdHis');
        $row['importanciaid']= 1;
        $row['descripcion']= "primer expediente";
        $row['nro_expendiente']= '0001-00000001';
        $row['sectorid']= 2;
        $row['estadoid']= 2;
        $row["baja"]= 0;
        $row["usuarioid"]= 12;
        $row["fecharegistro"]= date('Ymd');
        $idconexion = $conexion->ConfiguracionProcedimientoAlmacenado('adrg_expediente_h',1,$row);
        if  ($idconexion > 0) {
                header("Location:index.php");
        }
    }


?>