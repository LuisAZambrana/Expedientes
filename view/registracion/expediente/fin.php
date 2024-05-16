<?php
   require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
   require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/mail.php");
    $conexion = new db();
    //$_POST['borradorid']= $conexion->codificar_valor($_GET['borradorid'],0);
    $sql="SELECT * FROM adrg_expediente_h where baja = 0 and expedienteid=".$_POST['id'];
    $row = $conexion->fcGetSQL($sql,1,0);
    $vuelta = $_POST['pase'];
    if ($vuelta == 'sector'){
     $index = "index_s.php";
    }
    else
        {if ($vuelta =='exp'){
     $index="index.php";
   }
   else{
     $index="index_u  .php";
   }}
        $sql = "SELECT 'a' as abm, adrg_expediente_i1.* FROM adrg_expediente_i1 where finalizarid= -1";
        $row = $conexion->fcGetSQL($sql,1,0);
        $row['abm']= 'a';
        $row['expedienteid']= $_POST['id'];


        if ($_FILES['fin']['tmp_name']){   
            $binario_nombre_temporal = $_FILES['fin']['tmp_name'];
            $binario_nombre = $_FILES['fin']['name'];
            $binario_contenido= file_get_contents( $binario_nombre_temporal);
            $binario_tipo=$_FILES['fin']['type'];
        }
        $row["archivo"]= $binario_contenido;
        $row["nombre_archivo"]=  $binario_nombre;
        $row["nombre_origen"]=  $binario_nombre;
        $row["tipo_archivo"]= $binario_tipo;
        $row['mensaje']= $_POST['mensaje'];
        $row["baja"]= 0;
        session_start();
        $row["usuarioid"]=  $_SESSION["usuarioid"];
        $row["fecharegistro"]= date('Ymd');
        $idconexion = $conexion->ConfiguracionProcedimientoAlmacenado('adrg_expediente_i1',1,$row);
        if  ($idconexion > 0) {
            $sql = "SELECT 'm' as abm, adrg_expediente_h.* FROM adrg_expediente_h WHERE expedienteid=".$_POST['id'];
            $row_borrador =  $conexion->fcGetSQL($sql,1,2);
            $row_borrador['estadoid']= 3;
            $prueba_2 =  $conexion->ConfiguracionProcedimientoAlmacenado("adrg_expediente_h",1,$row_borrador);
        
            $sql_persona = "SELECT * FROM adrg_borrador_i3 WHERE baja = 0 and borradorid = ". $row_borrador['borradorid'];
            $persona_row =  $conexion->fcGetSQL($sql_persona,1,0);
            $tiene_persona = 0;
            $nombre_apellido='';
            foreach ($persona_row as $row){
                $el_row["email_informado"]=  $row['email'];
                $tiene_persona = 1;
                $nombre_apellido= $row['apellido'].', '.$row['nombre'];
            }
        
              if ($tiene_persona==1){
                 $elmail = new mail();
                  $asunto_expediente ='Estado de su Expediente: '.$row_borrador['nro_expendiente']. '- Finalización y respuesta.';
                       
                        ob_start();
                        ?>
                    
                      <p>Estimado, por la presente le queremos informar que su Expediente: 
                        <?php echo($row_borrador['nro_expendiente']) ?> fue cerrado con su respectiva respuesta adjuntada al mail. Saludos!
                      </p>
                            <img src="https://chimpay.gob.ar/wp-content/uploads/2024/03/logochimpay.png" alt="Logo" width="100" height="100" style="{justify-content: center;}">
                            <p>Por favor no responder este mensaje!</p>
                    <?php
                     $html=ob_get_clean();
                    
                     header("Location:/proyecto/view/registracion/expediente/".$index.'?e='. $elmail->enviar_mail_adjunto('c1931794.ferozo.com',
            'expedientes@chimpay.gob.ar',
            'L4/r3c0ntr4c0Nch4delal0r4s3c4',
             465,
            'expediente',
            $el_row["email_informado"],
            $nombre_apellido,
            $asunto_expediente,
            $html,
            $binario_contenido,
            $binario_nombre
        ));
                    
                    }    
                    else
                    {
                        header("Location:/proyecto/view/registracion/expediente/".$index);
                    }        
          


                header("Location:".$index);
        }
    
?>