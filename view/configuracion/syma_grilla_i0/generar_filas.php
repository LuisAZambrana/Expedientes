<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
$conexion = new db();
$_GET['id']= $conexion->codificar_valor($_GET['id'],0);
$sql="SELECT * FROM syma_grilla_h WHERE grillaid =". $_GET['id'];
$grilla= $conexion->fcGetSQL($sql,1,2);
$sql = "SELECT 'a' as abm, syma_grilla_i0.* FROM syma_grilla_i0 WHERE itemid = -1";
$row = $conexion ->fcGetSQL($sql,1,0);
//debemos saber cuales son las columnas a insertar...
$sql = "SELECT * FROM v_Sy_Tablas WHERE tablaid ='". $grilla['tabla']."'";
$lascolumnas = $conexion->fcGetSQL($sql,1,0);
$index = 0;
foreach($lascolumnas as $value) {
    $row['abm']= "a";
    $row['grillaid']= $_GET['id'];
    $row['caption']= $value['CampoId'];
    $row['visible']= 1;
    $row['tooltip']= $value['CampoId'];
    $row['fieldname']= $value['CampoId'];
    $row['visibleindex']= $index;
    $row['width']= 100;
    $row['groupindex']=0;
    $row['combolistaid']= 0;
    $row['html']= 0;
    $row['tienecondicion']= 0;
    $row['condicion']= "";
    $row['imagen']= 0;
    $row['url_imagen']= "";
    $row['campoimagen']= "";
    $row['hiperlink']= 0;
    $row['priority']= 1;
    $row['parametro']= 0;
    $row['nombresesion']= "";
    $row['baja']= 0;
    $row['usuarioid']= 12;
    $row["fecharegistro"]= date('Ymd');
    $resultado = $conexion->ConfiguracionProcedimientoAlmacenado("syma_grilla_i0",1,$row);
  
    if ($resultado = 0){
     
        header("Location:index.php?id=".$conexion->codificar_valor($_GET['id'],1));
    }
    $index= $index + 1;
}

 header("Location:index.php?id=".$conexion->codificar_valor($_GET['id'],1));
?>