<?php
    class db{
        private $hots= "database:3306";
        private $dbname= "myproyecto";
        private $dbuser="root";
        private $dbpassword= "";
      
        public function conexion_1(){
                $DBuser = "root";
                $DBpass = $_ENV["MYSQL_ROOT_PASSWORD"];  
                try{
                    $database = "mysql:host=database:3306;dbname=myproyecto";
                    $PDO = new PDO($database, $DBuser, $DBpass);
                    return $PDO;  
                } catch(PDOException $e) {
                    return $e->getMessage();
                }  
        }
        public function conexion(){
            $conn = new mysqli("database", "root", $_ENV['MYSQL_ROOT_PASSWORD'],"myproyecto");
            if (mysqli_connect_errno()) {
                trigger_error("Problem with connecting to database.");
            }
            $conn->set_charset("utf8");
            return $conn;
        }
        //$escalar: 0 tabla, 1 escalar, 2 row unica
        public function fcGetSQL($query, $resultado,$escalar)
        {
            $conexion = $this->conexion_1();
            $stament = $conexion->prepare($query);
            if ($resultado == 1)
            {
                if ($escalar == 1)
                {
                    if ($stament->execute())
                    {
                        $rows = $stament->fetch();
                        return (isset($rows))? false: $rows[0];
                          
                    }
                    else
                    {
                        return false;
                    }
                }
                else
                {    if ($escalar == 0)
                    {
                        return($stament->execute()) ? $stament->fetchAll() : false ;
                    }
                    else
                    {
                        return($stament->execute()) ? $stament->fetch() : false ;
                    }
                    
                }
            }
            else
                {
                    try{  //$conexion->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
                        return $stament->execute();}
                 catch (PDOException $e) {
                    return 'Error al ejecutar el procedimiento almacenado: ' . $e->getMessage();
                }

                   
                }
                     
        }

        public function ConfiguracionProcedimientoAlmacenado($oTabla, $oTipoProce, $objeto) 
        {
            try 
            {       $elprocedimiento = "";
                    $query_recuperar = "";
                    $parametros="";
                    $oquery = "SELECT * FROM v_Sy_Tablas Where TablaId='".$oTabla."'";
                    $oTabla_A = $this->fcGetSQL($oquery,1,0);
                    $oConexion = $this->conexion_1();
                    //$objeto["baja"]= 0;
                    if ($oTipoProce == 1) 
                    {
                       
                        foreach ($oTabla_A as $dato) {
                            if ($dato['Identidad']==1){
                                $parametros.= ", @_" . $dato['CampoId']; 
                               if ($objeto["abm"]!= "a")
                               {
                                $elprocedimiento.="SET @_".$dato['CampoId']."=".$objeto[$dato['CampoId']]."; ";
                               } 
                                        
                            }
                            else
                            {
                                $parametros.= ", :_" . $dato['CampoId'];
                            }
                        }
                        $elprocedimiento .= "CALL s_abm_". $oTabla . "(:_abm".$parametros;
                        $elprocedimiento.= ")";
                        $oProcedimiento = $oConexion->prepare($elprocedimiento);
                        $oProcedimiento->bindParam(':_abm',$objeto["abm"],PDO::PARAM_STR);
                        foreach ($oTabla_A as $dato_) {
                                if ($dato_['Identidad'] == 0) { 
                                
                                    foreach ($objeto as $key => $value) {
                                        if ($key == $dato_['CampoId'])
                                        {
                                            $el_valor= $value;
                                            
                                        }//cierre ($key == $dato_['CampoId']
                                    }//cierre foreach ($objeto as $key => $value) 

                                    switch ($dato_['Tipo']) {
                                        case "varchar":
                                            $oProcedimiento->bindParam(':_'.$dato_['CampoId'], $objeto[$dato_['CampoId']],PDO::PARAM_STR);
                                            break;
                                        case "int":
                                            $oProcedimiento->bindParam(':_'.$dato_['CampoId'], $objeto[$dato_['CampoId']],PDO::PARAM_INT);
                                            break;
                                        case "smallint":
                                            $oProcedimiento->bindParam(':_'.$dato_['CampoId'], $objeto[$dato_['CampoId']],PDO::PARAM_INT);
                                            break;
                                        case "bit":
                                            $oProcedimiento->bindParam(':_'.$dato_['CampoId'], $objeto[$dato_['CampoId']],PDO::PARAM_BOOL);
                                            break;
                                        case "blob":
                                            $oProcedimiento->bindParam(':_'.$dato_['CampoId'], $objeto[$dato_['CampoId']],PDO::PARAM_LOB);
                                            break;
                                        case "longblob":
                                            $oProcedimiento->bindParam(':_'.$dato_['CampoId'], $objeto[$dato_['CampoId']],PDO::PARAM_LOB);
                                            break;
                                        
                                        default:
                                            $oProcedimiento->bindParam(':_'.$dato_['CampoId'], $objeto[$dato_['CampoId']],PDO::PARAM_STR);
                                        }//cierre switch ($dato_['Tipo'])
                                      
                                        }
                                        else{
                                            //pregunto si es alta o modificacion
                                            if ($objeto["abm"]== "a") {
                                                $query_recuperar = "SELECT @_". $dato_['CampoId'] ." AS clave";
                                            }
                                            else
                                            {
                                                //$oProcedimiento->bindParam(':_'.$dato_['CampoId'], $objeto[$dato_['CampoId']],PDO::PARAM_INT |PDO::PARAM_INPUT_OUTPUT);
                                                $clave =  $objeto[$dato_['CampoId']];
                                            }
                                            
                                        }
                                    
                                    }
                    }
                    $oProcedimiento->execute();
                    $oProcedimiento->closeCursor();
                    if ($objeto["abm"]== "a") {
                        $oProcedimiento = $oConexion->prepare($query_recuperar);
                        $oProcedimiento->execute();
                        $resultado = $oProcedimiento->fetch(PDO::FETCH_ASSOC);
                        $clave = $resultado['clave'];
                    }
                    
                    return $clave;

            } 
            catch(PDOException $e) 
            {
                echo "Error de conexión: " . $e->getMessage();
                return 0;
            }
        }
        public function devolver_tipo($valor)
        {
            switch ($valor) {
                case "varchar":
                    return PDO::PARAM_STR;
                    break;
                case "int":
                    return PDO::PARAM_INT;
                    break;
                case "smallint":
                    return PDO::PARAM_INT;
                    break;
                case "bit":
                    return PDO::PARAM_BOOL;
                    break;
                case "char":
                    return PDO::PARAM_STR_CHAR;
                    break;
                default:
                    return PDO::PARAM_STR;
                } //cierre
        }

        public function manipular_dato($tipo,$valor)
        {
            switch ($tipo) {
                case "bit":
                    return (bool) $valor;
                    break;
                case "int":
                    return (int) $valor;
                    break;
                case "char":
                    return (string) $valor;
                    break;
                default:
                    return $valor;
                }
        }

        public function procedimiento_persona($abm,$personaid,$nombre,$apellido,$baja,$usuarioid,$fecharegistro)
        { try {
            $conexion = $this->conexion_1();
            //$stmt->closeCursor(); 
            $el_valor_clave = $personaid;
            $sql = "SET @_personaid =".$el_valor_clave ." ; CALL s_abm_adma_persona(:_abm, @_personaid, :_nombre, :_apellido, :_baja, :_usuarioid, :_fecharegistro)";
            $stmt = $conexion->prepare($sql);

            // Asigna los valores a los parámetros
            $stmt->bindParam(':_abm', $abm, PDO::PARAM_STR);
            //$stmt->bindParam(':_personaid', $personaid,PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT);
            $stmt->bindParam(':_nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':_apellido', $apellido, PDO::PARAM_STR);
            $stmt->bindParam(':_baja', $baja, PDO::PARAM_BOOL);
            $stmt->bindParam(':_usuarioid', $usuarioid, PDO::PARAM_INT);
            $stmt->bindParam(':_fecharegistro', $fecharegistro, PDO::PARAM_STR);

            // Asigna los otros valores a los parámetros según tu procedimiento almacenado

            // Ejecuta el procedimiento almacenado
           
                $stmt->execute();
                //$conexion->commit();
                $stmt->closeCursor(); // Cierra el cursor para que el siguiente query pueda ejecutarse correctamente

                // Recupera el valor del parámetro de salida
                $sql = "SELECT @_personaid AS personaid";
                $stmt = $conexion->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                $personaid = $resultado['personaid'];
                return $personaid;
                //return $sql;
            } catch (PDOException $e) {
                echo 'Error al ejecutar el procedimiento almacenado: ' . $e->getMessage();
            }

                    }

         public function configurar_grilla($grillaid,$condicion,$ruta){
            try{
                $sql = "SELECT * FROM syma_grilla_h where grillaid=".$grillaid;
                $lagrilla = $this->fcGetSQL($sql,1,2);
                $sql_1 = "SELECT * FROM syma_grilla_i0 where visible = 1 and baja = 0 and grillaid =".$grillaid;
                $sql_1.= " ORDER BY visibleindex ";
                $items = $this->fcGetSQL($sql_1,1,0);
               
                $columnas="";
                $datos="";
                $select = "SELECT ";
                $configuracion='<table id="tablax_'.$lagrilla['grillaid'].'" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                    <th>Acciones</th>
                    ';
                 if ($items): 
                    foreach($items as $row): 
                        $columnas.='<th>'.$row['caption'].'</th>
                        ';
                        //debemos recorrer los datos para encontrar los datos de cada columna.
                        $select.=''.$row['fieldname'].',';

                    endforeach;
                else:
                 return '';
                endif; 
                $select= substr($select, 0, -1);
                $sql_2 =  $select." FROM ".$lagrilla['tabla']." WHERE ".$condicion;
                $losdatos= $this->fcGetSQL($sql_2,1,0);
                $configuracion.=$columnas."</tr> 
                </thead>
                <tbody> 
                ";
                $i=0;
                if ($losdatos) {
                    foreach($losdatos as $row_d): 
                        $i=0;
                        $configuracion.='<tr>
                        <th>
                        <a';
                        
                        $configuracion.=' href="'.$ruta.'show.php?id='.$row_d[0].'"><i class="bx bx-folder-open"></i></a>
                        <a href="'.$ruta.'create.php"><i class="bx bx-folder-plus"></i></a>
                        <a href="'.$ruta.'edit.php?id='.$row_d[0].'"><i class="bx bx-folder"></i></a>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal'.$row_d[0].'"><i class="bx bx-folder-minus"></i></a>
                        <div class="modal fade" id="exampleModal'.$row_d[0].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                                      Esta seguro que quiere eliminar el registro?
                                          </div>
                                          <div class="modal-footer">
                                                      <a  class="btn btn-success" data-bs-dismiss="modal">Cancelar</a>
                                                      <a href="'.$ruta.'delete.php?id='. $row_d[0].'" type="button" class="btn btn-danger">Eliminar</a>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        </th>
                        ';
                        foreach($items as $row){
                                if($row['combolistaid']){
                                    if($row['combolistaid'] != 0){
                                        //$configuracion.="<td>".$row_d[$i]."</td>
                                        //";
                                        $configuracion.= "<td>".$this->configurar_lista_grilla($row['combolistaid'],$row_d[$i])."</td>
                                        ";
                                       
                                    }
                                    else {
                                        $configuracion.="<td>".$row_d[$i]."</td>
                                        ";   
                                    } 
                                }
                                else {
                                    $configuracion.="<td>".$row_d[$i]."</td>
                                    ";   
                                }
                                $i = $i+ 1;
                            
                        }
                        $configuracion.="
                        </tr>
                        ";
                    endforeach; }
                    else {
                        
                         $boton_nuevo = '<a href="'.$ruta.'create.php"><i class="bx bx-folder-plus"></i></a>';
                         $configuracion.= '
                         '.$boton_nuevo.'
                         ';
                    }
                    $i = $i -1;
                $configuracion.="</tbody>
                </table>
                ";
                $configuracion.=' <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js">
                </script>      
                <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js">
                </script>
                <script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.dataTables.js">
                </script>';
                $configuracion.=" 
                <script>
                    $(document).ready(function () {
                    $('#tablax_".$lagrilla['grillaid']."').DataTable({
                     scrollY: 350,
                    language: {";
                $configuracion.= ' processing: "Tratamiento en curso...",
                    search: "Buscar:",
                    lengthMenu: "Agrupar por: _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                             },
                        aria: {
                         sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                            }
                        },
                        responsive: true,
                        columnDefs: [
                                    { responsivePriority: 1, targets: 0 },
                                    { responsivePriority: 10001, targets:'. $i.'},
                                    { responsivePriority: 2, targets: -2 }
                                    ],
                        lengthMenu: [ [5, 10, 25, -1], [5, 10, 25, "All"] ]
         
                        });
                        });
                        </script>
                        ';
                return $configuracion; 
            }
            catch(PDOException $e) 
            {
                 
                return "Error: " . $e->getMessage();
            }
        }

        public function configurar_grilla_permisos($grillaid,$condicion,$ruta, $formularioid, $usuarioid){
            try{
                $sql = "SELECT * FROM syma_grilla_h where grillaid=".$grillaid;
                $lagrilla = $this->fcGetSQL($sql,1,2);
                $sql_1 = "SELECT * FROM syma_grilla_i0 where visible = 1 and baja = 0 and grillaid =".$grillaid;
                $sql_1.= " ORDER BY visibleindex ";
                $items = $this->fcGetSQL($sql_1,1,0);
               
                $columnas="";
                $datos="";
                $select = "SELECT ";
                $configuracion='<table id="tablax_'.$lagrilla['grillaid'].'" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                    <th>Acciones</th>
                    ';
                 if ($items): 
                    foreach($items as $row): 
                        $columnas.='<th>'.$row['caption'].'</th>
                        ';
                        //debemos recorrer los datos para encontrar los datos de cada columna.
                        $select.=''.$row['fieldname'].',';

                    endforeach;
                else:
                 return '';
                endif; 
                $select= substr($select, 0, -1);
                $sql_2 =  $select." FROM ".$lagrilla['tabla']." WHERE ".$condicion;
                $losdatos= $this->fcGetSQL($sql_2,1,0);
                $configuracion.=$columnas."</tr> 
                </thead>
                <tbody> 
                ";
                $i=0;
                if ($losdatos) {
                    foreach($losdatos as $row_d): 
                        $i=0;
                        $configuracion.='<tr>
                        <th>
                        <a data-toggle="tooltip" data-placement="top" title="Abrir Registro" ';
                        if ($this->FcGetHabiltarMenu($formularioid,3,$usuarioid,1) == 0){
                            $configuracion.= ' aria-disabled="true" data-bs-toggle="modal" data-bs-target="#exampleModal" ';
                        }
                        else{
                            $configuracion.=' href="'.$ruta.'show.php?id='.$row_d[0].'"
                            ';
                        }
                        $configuracion.='><i class="bx bx-folder-open"></i></a>';
                        $configuracion.='<a data-toggle="tooltip" data-placement="top" title="Nuevo Registro" ';
                        if ($this->FcGetHabiltarMenu($formularioid,3,$usuarioid,2) == 0){
                            $configuracion.= ' aria-disabled="true" data-bs-toggle="modal" data-bs-target="#exampleModal" ';
                        }
                        else{   
                            $configuracion.=' href="'.$ruta.'create.php"';
                        }
                        $configuracion.='><i class="bx bx-folder-plus"></i></a>
                        ';
                        $configuracion.='<a data-toggle="tooltip" data-placement="top" title="Editar Registro" ';
                        if ($this->FcGetHabiltarMenu($formularioid,3,$usuarioid,3) == 0){
                            $configuracion.= ' aria-disabled="true" data-bs-toggle="modal" data-bs-target="#exampleModal" ';
                        }
                        else{
                            $configuracion.= 'href="'.$ruta.'edit.php?id='.$row_d[0].'"';
                        }
                        $configuracion.='><i class="bx bx-folder"></i></a>
                        ';

                         $configuracion.='<a data-toggle="tooltip" data-placement="top" title="Borrar Registro" ';
                         if ($this->FcGetHabiltarMenu($formularioid,3,$usuarioid,4) == 0){
                            $configuracion.= 'data-bs-toggle="modal" data-bs-target="#exampleModal">';
                         }
                         else{
                            $configuracion.= ' data-bs-toggle="modal" data-bs-target="#exampleModal'.$row_d[0].'"> ';
                         }
                         $configuracion.=' <i class="bx bx-folder-minus"></i></a>
                        <div class="modal fade" id="exampleModal'.$row_d[0].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                                      Esta seguro que quiere eliminar el registro?
                                          </div>
                                          <div class="modal-footer">
                                                      <a  class="btn btn-success" data-bs-dismiss="modal">Cancelar</a>
                                                      <a href="'.$ruta.'delete.php?id='. $row_d[0].'" type="button" class="btn btn-danger">Eliminar</a>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bx bx-user-x"></i>    Permiso denegado</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                            </div>
                                <div class="modal-body">
                                    <p>Usted no tiene permiso para realizar la siguiente acción!!</p>
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                        </div>
                    </div>
                </div>
                        </th>
                        ';
                        foreach($items as $row){
                                if($row['combolistaid']){
                                    if($row['combolistaid'] != 0){
                                        //$configuracion.="<td>".$row_d[$i]."</td>
                                        //";
                                        $configuracion.= "<td>".$this->configurar_lista_grilla($row['combolistaid'],$row_d[$i])."</td>
                                        ";
                                       
                                    }
                                    else {
                                        $configuracion.="<td>".$row_d[$i]."</td>
                                        ";   
                                    } 
                                }
                                else {
                                    $configuracion.="<td>".$row_d[$i]."</td>
                                    ";   
                                }
                                $i = $i+ 1;
                            
                        }
                        $configuracion.="
                        </tr>
                        ";
                    endforeach; }
                    else {
                        
                         $boton_nuevo = '<a href="'.$ruta.'create.php"><i class="bx bx-folder-plus"></i></a>';
                         $configuracion.= '
                         '.$boton_nuevo.'
                         ';
                    }
                    $i = $i -1;
                $configuracion.="</tbody>
                </table>
                ";
                $configuracion.=' <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js">
                </script>      
                <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js">
                </script>
                <script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.dataTables.js">
                </script>';
                $configuracion.=" 
                <script>
                    $(document).ready(function () {
                    $('#tablax_".$lagrilla['grillaid']."').DataTable({
                     scrollY: 350,
                    language: {";
                $configuracion.= ' processing: "Tratamiento en curso...",
                    search: "Buscar:",
                    lengthMenu: "Agrupar por: _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                             },
                        aria: {
                         sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                            }
                        },
                        responsive: true,
                        columnDefs: [
                                    { responsivePriority: 1, targets: 0 },
                                    { responsivePriority: 10001, targets:'. $i.'},
                                    { responsivePriority: 2, targets: -2 }
                                    ],
                        lengthMenu: [ [5, 10, 25, -1], [5, 10, 25, "Todos"] ]
         
                        });
                        });
                        </script>
                        ';
                return $configuracion; 
            }
            catch(PDOException $e) 
            {
                 
                return "Error: " . $e->getMessage();
            }
        }
    
        public function configurar_grilla_personalizado($grillaid,$condicion,$controles){
            try{
                $sql = "SELECT * FROM syma_grilla_h where grillaid=".$grillaid;
                $lagrilla = $this->fcGetSQL($sql,1,2);
                $sql_1 = "SELECT * FROM syma_grilla_i0 where visible = 1 and baja = 0 and grillaid =".$grillaid;
                $sql_1.= " ORDER BY visibleindex ";
                $items = $this->fcGetSQL($sql_1,1,0);
               
                $columnas="";
                $datos="";
                $select = "SELECT ";
                $configuracion='<table id="tablax_'.$lagrilla['grillaid'].'" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                    <th>Acciones</th>
                    ';
                 if ($items): 
                    foreach($items as $row): 
                        $columnas.='<th>'.$row['caption'].'</th>
                        ';
                        //debemos recorrer los datos para encontrar los datos de cada columna.
                        $select.=''.$row['fieldname'].',';

                    endforeach;
                else:
                 return '';
                endif; 
                $select= substr($select, 0, -1);
                $sql_2 =  $select." FROM ".$lagrilla['tabla']." WHERE ".$condicion;
                $losdatos= $this->fcGetSQL($sql_2,1,0);
                $configuracion.=$columnas."</tr> 
                </thead>
                <tbody> 
                ";
                $i=0;
                if ($losdatos) {
                    foreach($losdatos as $row_d): 
                        $i=0;      
                        $configuracion.='<tr>
                        <th>';
                        foreach($controles as $elcontrol){
                        $configuracion.= '
                                            <a href="'.$elcontrol[0].$row_d[0].'"><i class="'.$elcontrol[1].'"></i></a>';
                        }
                        $configuracion.='
                      
                        </th>
                        ';
                        foreach($items as $row){
                            if($row['combolistaid']){
                                if($row['combolistaid'] != 0){
                                    //$configuracion.="<td>".$row_d[$i]."</td>
                                    //";
                                    $configuracion.= "<td>".$this->configurar_lista_grilla($row['combolistaid'],$row_d[$i])."</td>
                                    ";
                                   
                                }
                                else {
                                    $configuracion.="<td>".$row_d[$i]."</td>
                                    ";   
                                } 
                            }
                            else {
                                $configuracion.="<td>".$row_d[$i]."</td>
                                ";   
                            }
                            $i = $i+ 1;
                        }
                        $configuracion.="
                        </tr>
                        ";
                    endforeach; }

                    $i = $i -1;
                $configuracion.="</tbody>
                </table>
                ";
                $configuracion.=' <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js">
                </script>      
                <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js">
                </script>
                <script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.dataTables.js">
                </script>';
                $configuracion.=" 
                <script>
                    $(document).ready(function () {
                    $('#tablax_".$lagrilla['grillaid']."').DataTable({
                     scrollY: 350,
                    language: {";
                $configuracion.= ' processing: "Tratamiento en curso...",
                    search: "Buscar:",
                    lengthMenu: "Agrupar por: _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                             },
                        aria: {
                         sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                            }
                        },
                        responsive: true,
                        columnDefs: [
                                    { responsivePriority: 1, targets: 0 },
                                    { responsivePriority: 10001, targets:'. $i.'},
                                    { responsivePriority: 2, targets: -2 }
                                    ],
                        lengthMenu: [ [5, 10, 25, -1], [5, 10, 25, "All"] ]
         
                        });
                        });
                        </script>
                        ';
                
                return $configuracion; 
            }
            catch(PDOException $e) 
            {
                 
                return "Error: " . $e->getMessage();
            }
        }

        public function configurar_grilla_sin_control($grillaid,$condicion){
            try{
                $sql = "SELECT * FROM syma_grilla_h where grillaid=".$grillaid;
                $lagrilla = $this->fcGetSQL($sql,1,2);
                $sql_1 = "SELECT * FROM syma_grilla_i0 where visible = 1 and baja = 0 and grillaid =".$grillaid;
                $sql_1.= " ORDER BY visibleindex ";
                $items = $this->fcGetSQL($sql_1,1,0);
               
                $columnas="";
                $datos="";
                $select = "SELECT ";
                $configuracion='<table id="tablax_'.$lagrilla['grillaid'].'" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                 ';
                 if ($items): 
                    foreach($items as $row): 
                        $columnas.='<th>'.$row['caption'].'</th>
                        ';
                        //debemos recorrer los datos para encontrar los datos de cada columna.
                        $select.=''.$row['fieldname'].',';

                    endforeach;
                else:
                 return '';
                endif; 
                $select= substr($select, 0, -1);
                $sql_2 =  $select." FROM ".$lagrilla['tabla']." WHERE ".$condicion;
                $losdatos= $this->fcGetSQL($sql_2,1,0);
                $configuracion.=$columnas."</tr> 
                </thead>
                <tbody> 
                ";
                $i=0;
                if ($losdatos) {
                    foreach($losdatos as $row_d): 
                        $i=0;      
                        $configuracion.='<tr>
                        ';
                       
                        foreach($items as $row){
                            if($row['combolistaid']){
                                if($row['combolistaid'] != 0){
                                    //$configuracion.="<td>".$row_d[$i]."</td>
                                    //";
                                    $configuracion.= "<td>".$this->configurar_lista_grilla($row['combolistaid'],$row_d[$i])."</td>
                                    ";
                                   
                                }
                                else {
                                    if ($row['html']== 1){
                                        $configuracion.="<td><div>".htmlentities($row_d[$i])."</div></td>
                                        ";  
                                    }
                                    else
                                    {
                                        $configuracion.="<td>".$row_d[$i]."</td>
                                        ";   
                                    }
                                  
                                } 
                            }
                            else {
                                if ($row['html']== '1'){
                                    $configuracion.="<td>".nl2br($row_d[$i])."</td>
                                    "; 
                                }
                                else {
                                    $configuracion.="<td>".$row_d[$i]."</td>
                                    ";   
                                }
                               
                            }
                            $i = $i+ 1;
                        }
                        $configuracion.="
                        </tr>
                        ";
                    endforeach; }

                    $i = $i -1;
                $configuracion.="</tbody>
                </table>
                ";
                $configuracion.=' <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js">
                </script>      
                <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js">
                </script>
                <script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.dataTables.js">
                </script>';
                $configuracion.=" 
                <script>
                    $(document).ready(function () {
                    $('#tablax_".$lagrilla['grillaid']."').DataTable({
                     scrollY: 350,
                    language: {";
                $configuracion.= ' processing: "Tratamiento en curso...",
                    search: "Buscar:",
                    lengthMenu: "Agrupar por: _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                             },
                        aria: {
                         sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                            }
                        },
                        responsive: true,
                        columnDefs: [
                                    { responsivePriority: 1, targets: 0 },
                                    { responsivePriority: 10001, targets:'. $i.'},
                                    { responsivePriority: 2, targets: -2 }
                                    ],
                        lengthMenu: [ [5, 10, 25, -1], [5, 10, 25, "All"] ]
         
                        });
                        });
                        </script>
                        ';
                return $configuracion; 
            }
            catch(PDOException $e) 
            {
                 
                return "Error: " . $e->getMessage();
            }
        }

        public function configurar_grilla_sin_control_junto($grillaid,$condicion){
            try{
                $sql = "SELECT * FROM syma_grilla_h where grillaid=".$grillaid;
                $lagrilla = $this->fcGetSQL($sql,1,2);
                $sql_1 = "SELECT * FROM syma_grilla_i0 where visible = 1 and baja = 0 and grillaid =".$grillaid;
                $sql_1.= " ORDER BY visibleindex ";
                $items = $this->fcGetSQL($sql_1,1,0);
               
                $columnas="";
                $datos="";
                $select = "SELECT ";
                $configuracion='<table id="tablax_'.$lagrilla['grillaid'].'" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                 ';
                 if ($items): 
                    foreach($items as $row): 
                        $columnas.='<th>'.$row['caption'].'</th>
                        ';
                        //debemos recorrer los datos para encontrar los datos de cada columna.
                        $select.=''.$row['fieldname'].',';

                    endforeach;
                else:
                 return '';
                endif; 
                $select= substr($select, 0, -1);
                $sql_2 =  $select." FROM ".$lagrilla['tabla']." WHERE ".$condicion;
                $losdatos= $this->fcGetSQL($sql_2,1,0);
                $configuracion.=$columnas."</tr> 
                </thead>
                <tbody> 
                ";
                $i=0;
                if ($losdatos) {
                    foreach($losdatos as $row_d): 
                        $i=0;      
                        $configuracion.='<tr>
                        ';
                       
                        foreach($items as $row){
                            if($row['combolistaid']){
                                if($row['combolistaid'] != 0){
                                    //$configuracion.="<td>".$row_d[$i]."</td>
                                    //";
                                    $configuracion.= "<td>".$this->configurar_lista_grilla($row['combolistaid'],$row_d[$i])."</td>
                                    ";
                                   
                                }
                                else {
                                    if ($row['html']== 1){
                                        $configuracion.="<td><div>".htmlentities($row_d[$i])."</div></td>
                                        ";  
                                    }
                                    else
                                    {
                                        $configuracion.="<td>".$row_d[$i]."</td>
                                        ";   
                                    }
                                  
                                } 
                            }
                            else {
                                if ($row['html']== '1'){
                                    $configuracion.="<td>".nl2br($row_d[$i])."</td>
                                    "; 
                                }
                                else {
                                    $configuracion.="<td>".$row_d[$i]."</td>
                                    ";   
                                }
                               
                            }
                            $i = $i+ 1;
                        }
                        $configuracion.="
                        </tr>
                        ";
                    endforeach; }

                    $i = $i -1;
                $configuracion.="</tbody>
                </table>
                ";
                $configuracion.=' <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js">
                </script>      
                <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js">
                </script>
                <script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.dataTables.js">
                </script>';
                $configuracion.=" 
                <script>
                    $(document).ready(function () {
                    $('#tablax_".$lagrilla['grillaid']."').DataTable({
                    responsive: true,
                    
                        });
                        });
                        </script>
                        ";
                return $configuracion; 
            }
            catch(PDOException $e) 
            {
                 
                return "Error: " . $e->getMessage();
            }
        }


        public function configurar_grilla_param_alta($grillaid,$condicion,$ruta,$condicion_alta){
            try{
                $sql = "SELECT * FROM syma_grilla_h where grillaid=".$grillaid;
                $lagrilla = $this->fcGetSQL($sql,1,2);
                $sql_1 = "SELECT * FROM syma_grilla_i0 where visible = 1 and baja = 0 and grillaid =".$grillaid;
                $sql_1.= " ORDER BY visibleindex ";
                $items = $this->fcGetSQL($sql_1,1,0);
               
                $columnas="";
                $datos="";
                $select = "SELECT ";
                $configuracion='<table id="tablax_'.$lagrilla['grillaid'].'" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                    <th>Acciones</th>
                    ';
                 if ($items): 
                    foreach($items as $row): 
                        $columnas.='<th>'.$row['caption'].'</th>
                        ';
                        //debemos recorrer los datos para encontrar los datos de cada columna.
                        $select.=''.$row['fieldname'].',';

                    endforeach;
                else:
                 return '';
                endif; 
                $select= substr($select, 0, -1);
                $sql_2 =  $select." FROM ".$lagrilla['tabla']." WHERE ".$condicion;
                $losdatos= $this->fcGetSQL($sql_2,1,0);
                $configuracion.=$columnas."</tr> 
                </thead>
                <tbody> 
                ";
                $i=0;
                if ($losdatos) {
                    foreach($losdatos as $row_d): 
                        $i=0;
                        $configuracion.='<tr>
                        <th>
                        <a href="'.$ruta.'show.php?id='.$row_d[0].'"><i class="bx bx-folder-open"></i></a>
                        <a href="'.$ruta.'create.php?id='.$condicion_alta.'"><i class="bx bx-folder-plus"></i></a>
                        <a href="'.$ruta.'edit.php?id='.$row_d[0].'"><i class="bx bx-folder"></i></a>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal'.$row_d[0].'"><i class="bx bx-folder-minus"></i></a>
                        <div class="modal fade" id="exampleModal'.$row_d[0].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                    <div class="modal-content">
                                          <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                                      Esta seguro que quiere eliminar el registro?
                                          </div>
                                          <div class="modal-footer">
                                                      <a  class="btn btn-success" data-bs-dismiss="modal">Cancelar</a>
                                                      <a href="'.$ruta.'delete.php?id='. $row_d[0].'" type="button" class="btn btn-danger">Eliminar</a>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        </th>
                        ';
                        foreach($items as $row){
                            if($row['combolistaid']){
                                if($row['combolistaid'] != 0){
                                    //$configuracion.="<td>".$row_d[$i]."</td>
                                    //";
                                    $configuracion.= "<td>".$this->configurar_lista_grilla($row['combolistaid'],$row_d[$i])."</td>
                                    ";
                                   
                                }
                                else {
                                    $configuracion.="<td>".$row_d[$i]."</td>
                                    ";   
                                } 
                            }
                            else {
                                $configuracion.="<td>".$row_d[$i]."</td>
                                ";   
                            }
                            $i = $i+ 1;
                        }
                        $configuracion.="
                        </tr>
                        ";
                    endforeach; }
                    else {
                        
                         $boton_nuevo = '<a href="'.$ruta.'create.php?id='.$condicion_alta.'"><i class="bx bx-folder-plus"></i></a>';
                         $configuracion.= '
                         '.$boton_nuevo.'
                         ';
                    }
                    $i = $i -1;
                $configuracion.="</tbody>
                </table>
                ";
                $configuracion.=' <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js">
                </script>      
                <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js">
                </script>
                <script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.dataTables.js">
                </script>';
                $configuracion.=" 
                <script>
                    $(document).ready(function () {
                    $('#tablax_".$lagrilla['grillaid']."').DataTable({
                     scrollY: 350,
                    language: {";
                $configuracion.= ' processing: "Tratamiento en curso...",
                    search: "Buscar:",
                    lengthMenu: "Agrupar por: _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                             },
                        aria: {
                         sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                            }
                        },
                        responsive: true,
                        columnDefs: [
                                    { responsivePriority: 1, targets: 0 },
                                    { responsivePriority: 10001, targets:'. $i.'},
                                    { responsivePriority: 2, targets: -2 }
                                    ],
                        lengthMenu: [ [5, 10, 25, -1], [5, 10, 25, "All"] ]
         
                        });
                        });
                        </script>
                        ';
                return $configuracion; 
            }
            catch(PDOException $e) 
            {
                 
                return "Error: " . $e->getMessage();
            }
        }
    
        public function configurar_lista_grilla($listaid,$valor)
        {   
            try{
                $sql = "SELECT * FROM syrg_lista_h WHERE baja = 0 and listaid=".$listaid;
                $lista = $this->fcGetSQL($sql,1,2);
                $resultado="";
                $switch="";
                $arreglo= array(null => 'No contiene dato');
                if($lista['listafija']==0){
                    $sql_items= "SELECT * FROM syrg_lista_i0 WHERE baja = 0 and listaid=".$listaid;
                    $items = $this->fcGetSQL($sql_items,1,0);
                    $sql_datos = $lista['recordsource'];
                    $datos = $this->fcGetSQL($sql_datos,1,0);
                    $resultado=' <td> <? ';
                    foreach($datos as $el_dato){
                        $elemento ="";
                        $referecia="";
                        foreach($items as $item){
                           
                            if ($item['valuemember'] == 1){
                              
                                $referecia =  $el_dato[$item['campoid']] ;   
                            }
                            if ($item['displaymember'] == 1){
                              
                                $elemento =  $el_dato[$item['campoid']] ;   
                            }
                           
                            $arreglo[$referecia]=  $elemento;
                        }
                    }
                  
                }
                else{
                    $sql_items= "SELECT * FROM syrg_lista_i1 WHERE baja = 0 and listaid=".$listaid;
                    $items = $this->fcGetSQL($sql_items,1,0);
                    $elemento="";
                    $referecia="";
                    foreach($items as $item){
                        $referecia= $item['valuemember'];
                        $elemento= $item['displaymember'];
                        $arreglo[$referecia]=  $elemento;
                    }
                }
                
                return $arreglo[$valor];

            }
            catch(PDOException $e) 
            {
                 
                return "Error: " . $e->getMessage();
            }
        }

        public function configurar_lista($listaid,$condicion,$nombre,$valor){
                try{
                    $sql = "SELECT * FROM syrg_lista_h WHERE baja = 0 and listaid=".$listaid;
                    $lista = $this->fcGetSQL($sql,1,2);
                    $resultado='<label class="input-group-text" for="'.$nombre.'_'.$listaid.'">Seleccion</label>
                        <select class="form-select" id="'.$nombre.'_'.$listaid.'" name="'.$nombre.'"> 
                        ';
                    $seleccion= 0;
                    if ($valor) {
                        $seleccion= 1;}
                    else{
                        $resultado.= ' <option selected>Ninguno...</option>
                        ';
                    }
                    $switch="";
                    if($lista['listafija']==0){
                        $sql_items= "SELECT * FROM syrg_lista_i0 WHERE baja = 0 and listaid=".$listaid;
                        $items = $this->fcGetSQL($sql_items,1,0);
                        if ($condicion){
                            $sql_datos = $condicion;
                        }
                        else{
                            $sql_datos = $lista['recordsource'];
                        }
                        $datos = $this->fcGetSQL($sql_datos,1,0);
                        foreach($datos as $el_dato){
                            $switch.='<option value="';
                            foreach($items as $item){
                               
                                if ($item['valuemember'] == 1){
                                  
                                    $switch.=  $el_dato[$item['campoid']].'"';
                                    if ($seleccion == 1){
                                        if ($valor == $el_dato[$item['campoid']]){
                                            $switch.= 'selected' ; 
                                        }
                                      
                                    }
                                    $switch.='>' ;   
                                }
                                if ($item['displaymember'] == 1){
                                  
                                    $switch.= $el_dato[$item['campoid']].'</option>
                                    ';   
                                }
                               
                            }
                        }
                      
                    }
                    else{
                        $sql_items= "SELECT * FROM syrg_lista_i1 WHERE baja = 0 and listaid=".$listaid;
                        $items = $this->fcGetSQL($sql_items,1,0);
                        
                        foreach($items as $item){
                            $switch.='<option value="';
                            $switch.=$item['valuemember'].'"';
                            if ($seleccion == 1){
                                if ($valor == $item['valuemember']){
                                    $switch.= 'selected'  ;
                                }
                            }
                            $switch.='>' ;   
                            $switch.=$item['displaymember'].'</option>
                            ';   
                        }
                    }
                    
                    $resultado.= $switch.' </select>';
                    return $resultado;
    
                }

            
            catch(PDOException $e) 
            {
                 
                return "Error: " . $e->getMessage();
            }
        }

        public function configurar_lista_solo_opciones($listaid,$condicion,$nombre,$valor){
            try{
                $sql = "SELECT * FROM syrg_lista_h WHERE baja = 0 and listaid=".$listaid;
                $lista = $this->fcGetSQL($sql,1,2);
                $resultado=' ';
                $seleccion= 0;
                if ($valor) {
                    $seleccion= 1;}
                else{
                    $resultado.= ' <option selected>Ninguno...</option>
                    ';
        
                }
                $switch="";
                if($lista['listafija']==0){
                    $sql_items= "SELECT * FROM syrg_lista_i0 WHERE baja = 0 and listaid=".$listaid;
                    $items = $this->fcGetSQL($sql_items,1,0);
                    if ($condicion){
                        $sql_datos = $condicion;
                    }
                    else{
                        $sql_datos = $lista['recordsource'];
                    }
                    $datos = $this->fcGetSQL($sql_datos,1,0);
                    foreach($datos as $el_dato){
                        $switch ='<option value="';
                        foreach($items as $item){
                           
                            if ($item['valuemember'] == 1){
                              
                                $switch.=  $el_dato[$item['campoid']].'"';
                                if ($seleccion == 1){
                                    if ($valor == $el_dato[$item['campoid']]){
                                        $switch.= 'selected' ; 
                                    }
                                  
                                }
                                $switch.='>' ;   
                            }
                            if ($item['displaymember'] == 1){
                              
                                $switch.= $el_dato[$item['campoid']].'</option>
                                ';   
                                echo($switch);
                            }
                           
                        }
                    }
                  
                }
                else{
                    $sql_items= "SELECT * FROM syrg_lista_i1 WHERE baja = 0 and listaid=".$listaid;
                    $items = $this->fcGetSQL($sql_items,1,0);
                    
                    foreach($items as $item){
                        $switch='<option value="';
                        $switch.=$item['valuemember'].'"';
                        if ($seleccion == 1){
                            if ($valor == $item['valuemember']){
                                $switch.= 'selected'  ;
                            }
                        }
                        $switch.='>' ;   
                        $switch.=$item['displaymember'].'</option>
                        ';   
                        echo($switch);
                    }
                }
                
                $resultado.= $switch;
                return $resultado;

            }

        
        catch(PDOException $e) 
        {
             
            return "Error: " . $e->getMessage();
        }
    }

        public function generar_menu($usuarioname, $elusuarioid){
        try{  
            $menus = $this->fcGetSQL("SELECT * FROM adma_menu_h WHERE baja = 0",1,0);
            $nav = ' <nav id="navbar" class="navbar nav-menu">
            <ul>
              <li><a href="/proyecto/index.php#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Usuario:'.$usuarioname;
            $nav.= '</span></a></li>';
            foreach ($menus as $elmenu){
                if ($this->FcGetHabiltarMenu($elmenu['menuhorizontalid'],1,$elusuarioid,1) == 1){
                    $nav.='<li class="nav-item dropdown"><a class="naSv-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="';
                    $nav.= $elmenu['imagenurl'].'"></i> <span>'.$elmenu['nombremenuds'].'</span></a>
                    ';
                    $nav.='<ul class="dropdown-menu">';
                    $subitem="";
                    $datos_subitems= $this->fcGetSQL("SELECT * FROM adma_menu_i0 WHERE baja = 0 and menuid=".$elmenu['menuhorizontalid'],1,0);
                    foreach($datos_subitems as $item){
                        if ($this->FcGetHabiltarMenu($item['formularioid'],2,$elusuarioid,1) == 1) {
                            $subitem= '<li><a href="'.$item['navigateurl'].'" class="dropdown-item"><i class="'.$item['imageurl'].'"></i> <span>'.$item['text'].'</span></a></li>';
                            $nav.='
                            '.$subitem;
                        }   
                     
                    }
                    $nav.='</ul>
                      </li>';

                }   
            }
            $nav.=' <liv><a class="nav-link" data-bs-target="#salir_pagina" data-bs-toggle="modal"><i class="bx bxs-exit"></i> <span>Salir</span></a></lib>
            ';
            $nav.='</ul>
            </nav>
            ';
            $nav.='    <div class="modal fade" id="salir_pagina"" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Abandonar el sistema?</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                    Esta seguro que quiere salir del sistema?
                        </div>
                        <div class="modal-footer">
                                    <a  class="btn btn-success" data-bs-dismiss="modal">Cancelar</a>
                                    <a href="/proyecto/logout.php" type="button" class="btn btn-danger">Salir!</a>
                        </div>
                  </div>
                </div>
                </div>';

            return $nav;
         } 
         catch(PDOException $e) 
         {
              
             return "Error: " . $e->getMessage();
         }  

        }

        public function FcGetHabiltarMenu($formularioid,$tipo_objeto,$usuarioid,$accion){
            try{
                $resultado = $this->fcGetSQL("SELECT fcgethabilitacionmenu(".$formularioid.",".$tipo_objeto.", ".$usuarioid.", ".$accion.")",1,2);
                return $resultado[0];
                //return 1;
            }
            catch(PDOException $e) 
            {
                 
                return "Error: " . $e->getMessage();
            }  
   
        }
    }
?>