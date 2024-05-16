<?php
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/mail.php");
$db = new db();
$el_row = $db->fcGetSQL("SELECT 'a' as abm, adrg_expediente_i0.* FROM adrg_expediente_i0  where paseid = -1",1,0);
$el_row["abm"]="a";
$el_row["tipo_destinoid"]= $_POST['tipodestinoid'];

$sql_borrador = "SELECT * FROM adrg_expediente_h where expedienteid = ".  $_POST['expedienteid'];
$borrador_row = $db->fcGetSQL($sql_borrador,1,2);
$sql_persona = "SELECT * FROM adrg_borrador_i3 WHERE baja = 0 and borradorid = ". $borrador_row['borradorid'];
$persona_row = $db->fcGetSQL($sql_persona,1,0);
session_start();
if ($_POST['tipodestinoid']==2){
    $sql_sector = "SELECT * FROM adma_sector where sectorid =". $_POST['sectorid_destino'];
    $row_sector = $db->fcGetSQL($sql_sector,1,2);
}
else {
    $sql= "SELECT sectorid  from sema_usuario_i1 where baja = 0 and personaid = ". $_SESSION['usuarioid']." LIMIT 1";
    $_sector_row= $db->fcGetSQL($sql,1,2);
    $_sectorid = $_sector_row['sectorid'];
    $sql_sector = "SELECT * FROM adma_sector where sectorid =". $_sectorid;
    $row_sector = $db->fcGetSQL($sql_sector,1,2);
}


$tiene_persona = 0;
$nombre_apellido='';
foreach ($persona_row as $row){
    $el_row["email_informado"]=  $row['email'];
    $tiene_persona = 1;
    $nombre_apellido= $row['apellido'].', '.$row['nombre'];
}



if ($_POST['tipodestinoid']==1){
    $el_row['personaid_destino']= $_POST['personaid_destino'];   
}
else {   
    $el_row['sectorid_destino']= $_POST['sectorid_destino'];
}

$el_row["ultimo_pase"]=1;
$el_row["expedienteid"]= $_POST['expedienteid'];
$el_row["observacion"]= $_POST['observacion'];
$el_row["fecha_pase"]= date('YmdHis');
$el_row["baja"]= 0;
$el_row["usuarioid"]= $_SESSION['usuarioid'];
$sql= "SELECT sectorid  from sema_usuario_i1 where baja = 0 and personaid = ". $_SESSION['usuarioid']." LIMIT 1";
$_sector_row= $db->fcGetSQL($sql,1,2);
$el_row["sectorid_origen"] = $_sector_row['sectorid'];
$el_row["fecharegistro"]= date('Ymd');
$sql = "UPDATE adrg_expediente_i0 set ultimo_pase = 0 where expedienteid = ". $_POST['expedienteid'];
$db->fcGetSQL($sql,1,0);
$prueba_1= $db->ConfiguracionProcedimientoAlmacenado("adrg_expediente_i0",1,$el_row);
if ($prueba_1 > 0) {
    $sql = "SELECT 'm' as abm, adrg_expediente_h.* FROM adrg_expediente_h WHERE expedienteid=".$_POST['expedienteid'];
    $row_borrador = $db->fcGetSQL($sql,1,2);
    $row_borrador['estadoid']= 2;
    $prueba_2 = $db->ConfiguracionProcedimientoAlmacenado("adrg_expediente_h",1,$row_borrador);

    if ($_POST['tipodestinoid']==1){
        $index = "index_u.php";
            }
            else
            {
                $index="index_s.php";
            }

            if ($tiene_persona==1){
                $elmail = new mail();
                $asunto_expediente ='Estado de su Expediente: '.$borrador_row['nro_expendiente']. '- Pase realizado';
               
                ob_start();
                ?>
            
              <p>Estimado, por la presente le queremos informar que su Expediente: 
                <?php echo($borrador_row['nro_expendiente']) ?> se encuentra en poder del sector de 
                <?php echo($row_sector['sectords']) ?> para ser procesado. Saludos!
              </p>
                    <img src="https://chimpay.gob.ar/wp-content/uploads/2024/03/logochimpay.png" alt="Logo" width="100" height="100" style="{justify-content: center;}">
                    <p>Por favor no responder este mensaje!</p>
            <?php
             $html=ob_get_clean();
            
             header("Location:/proyecto/view/registracion/expediente/".$index.'?e='. $elmail->enviar_mail('c1931794.ferozo.com',
    'expedientes@chimpay.gob.ar',
    'L4/r3c0ntr4c0Nch4delal0r4s3c4',
     465,
    'expediente',
    $el_row["email_informado"],
    $nombre_apellido,
    $asunto_expediente,
    $html));
            
            }    
            else
            {
                header("Location:/proyecto/view/registracion/expediente/".$index);
            }        
  
}else{header("Location:create.php");}
?>