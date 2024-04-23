<?php
    class c_proc
    { 
        public function fcGenAbmStore($tablaid) 
        {   
            require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
            $stbAbmStore = "";
            $stbInsert="";       
            $TieneIdentidad = false;
            $TieneObservacion = false;
            $TieneClave = false;
            $TieneMovTipo = false;
            $TieneMovNro = false;
            $TieneMovItem = false;
            $TablaRgPrincipal = false;
            $TieneFechaRegistro = false;
            $TienePeriodo = false;
            $TieneTemporada = false;
            $stbVariables="";    
            $Filas = 0;
            $MovNro = 0;
            $strInsertIndentidad="";
            $stbUpdate="";
            $strParamSalida = "";
            $strInsertIndentidad = "";
            $stbInsertSel="";   
            $CampoId = "";
            $Tipo = "";
            $DecPrec = "";
            $DecEsc = "";
            $Longitud = "";
            $ValorDef = "";
            $updateClave="";
            $strStoreName = "s_Abm_".$tablaid;
            $Cuenta3 = 0;
                
                        // Assuming $dsMaster is already defined and populated in PHP
            $oquery = "SELECT * FROM v_Sy_Tablas Where TablaId='".$tablaid."'";
            $conexion = new db();
            $rDef = $conexion->fcGetSQL($oquery,1,0);
                        
            foreach ($rDef as $r) 
            {
              if ($r['Identidad'] == 1) {
                                $TieneIdentidad = true;
                                $TieneClave = true;
                                $strInsertIndentidad = "SET _".strtolower($r['CampoId'])."= LAST_INSERT_ID();";
                                $updateClave.= $r['CampoId']. " =  _". $r['CampoId'];
               }               
            }    
            
            if (!$TieneClave && !$TieneIdentidad) 
            {
                return null;
            }
            $Filas = count($rDef);
            if ($Filas == 0) 
            {
                return null;
            }
            foreach ($rDef as $i => $r) 
            {
                $CampoId = "";
                $Tipo = "";
                $DecPrec = "";
                $DecEsc = "";
                $Longitud = "";
                $ValorDef = "";
                $Cuenta3 = ($Cuenta3 < 3) ? $Cuenta3 + 1 : 0;
                
                $CampoId = strtolower($r["CampoId"]);
                $Tipo = strtolower($r["Tipo"]);
                
                if ($Tipo == "decimal") 
                {
                    $DecPrec = $r["DecPrecision"];
                    $DecEsc = $r["DecEscala"];
                    $Longitud = "(" . $DecPrec . "," . $DecEsc . ")";
                } elseif (in_array($Tipo, ["varchar", "nvarchar", "char", "varchar2"])) 
                {
                    $Longitud = "(" . $r["Longitud"] . ")";
                }
            
                $strParamSalida = ($r["Identidad"] == 1) ? "INOUT" : "IN";
                $stbVariables.= str_repeat("\t", 1) . ", ". $strParamSalida ." _" . $CampoId." ".$Tipo.$Longitud. PHP_EOL;
                
                if ($r["Identidad"] == 0) 
                {
                    $CrLf = ($Cuenta3 > 2) ? PHP_EOL . "\t\t\t" : "";
                    if ($i < $Filas) 
                    {   $stbUpdate.= $CampoId ."=   _". $CampoId.","; 
                        $stbInsert .=  $CampoId . ",";
                        $stbInsertSel .= "_" . $CampoId . ",";
                    } else 
                    {
                        $stbUpdate.= $CampoId ."=   _". $CampoId; 
                        $stbInsert .= $CampoId . PHP_EOL;
                        $stbInsertSel .= "_" . $CampoId . PHP_EOL;
                    }
                }
                
            }
                    
                        // Remaining part of the function remains mostly the same, but with
            //$stbAbmStore= "DELIMITER $$". PHP_EOL;
            //Eliminamos el procedimiento almacenado si exiese.
            $nombre_procedimiento = "s_abm_".$tablaid;
            if ($this->fcGetExisteProc($nombre_procedimiento) == 1)
            {
                $eleminar_proc = "DROP PROCEDURE ".$nombre_procedimiento.";";
                $db_elminar = new db();
                $resultado = $db_elminar ->fcGetSQL($eleminar_proc,0,0); 
            }

            $stbAbmStore.="CREATE procedure s_abm_".$tablaid."(IN " ;
            $stbAbmStore.="_abm  varchar(50)";
            $stbAbmStore.=  $stbVariables.")".PHP_EOL;
            $stbAbmStore.= "BEGIN" . $CrLf;
            $stbAbmStore.= " SET _fecharegistro = NOW();" . $CrLf;
            $stbAbmStore.= "START TRANSACTION;" . $CrLf;

            //INSERT
            //--------------------------------------------------------
            $stbAbmStore.="if _abm = 'a' then".PHP_EOL;
            $stbAbmStore.=" insert into ".$tablaid.PHP_EOL;
            $stbAbmStore.="(".trim($stbInsert, ",").")".PHP_EOL;
            $stbAbmStore.="select".PHP_EOL;
            $stbAbmStore.= trim($stbInsertSel, ",").";".PHP_EOL;
            $stbAbmStore.=  $strInsertIndentidad.PHP_EOL;
           
            //UPDATE
            //--------------------------------------------------------
            $stbAbmStore.="elseif _abm = 'm' then".PHP_EOL;
            $stbAbmStore.="update ".$tablaid." set ".PHP_EOL;
            $stbAbmStore.=trim($stbUpdate,",").PHP_EOL;
            $stbAbmStore.="where ".PHP_EOL;
            $stbAbmStore.=  trim($updateClave,",").";".PHP_EOL;
            $stbAbmStore.=" END IF;";

            $stbAbmStore.= "COMMIT;".PHP_EOL;
            $stbAbmStore.= "END;";
            //$stbAbmStore.= " DELIMITER ;";
          
            return $stbAbmStore;
        }

        public function fcGetExisteProc($nombre_procedimiento)
        {
            require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
            $db = new db();
            $oquery = "SELECT specific_name from information_schema.routines where specific_name ='".$nombre_procedimiento."'";
           try{
            $ocolumnas = $db->fcGetSQL($oquery,1,1);
            return ($ocolumnas != NULL )? 1 : 0;
            } catch(PDOException $e) {
            return $e->getMessage();
            }  
        }

        public function fcGetGenerarProcedimiento($tablaid)
        {
            $codigo = $this->fcGenAbmStore($tablaid);
            $db= new db();
            $db->fcGetSQL($codigo,0,0);
            return 1;
        }
    } 
    ?>