<?php
    class adma_persona_i0_model {
        private $PDO;
        public function __construct(){
            require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
            $con= new db();
            $this->PDO = $con->conexion_1();
        }
        public function insertar($personaid, $fecha_nacimiento,$tipo_identificacionid,$identificacionid,$sexoid,$cuil,$estado_civil,$usuarioid,$fecharegistro){
            $stament = $this->PDO->prepare("INSERT INTO adma_persona_i0(id,personaid,fecha_nacimiento,tipo_identificacionid,identificacionid,sexoid,cuil,estado_civil,baja,usuarioid,fecharegistro) VALUES(NULL,:personaid,:fecha_nacimiento,:tipo_identificacionid,:identificacionid,:sexoid,:cuil,:estado_civil,0,:usuarioid,:fecharegistro)");
            $stament->bindParam(":personaid",$personaid);
            $stament->bindParam(":fecha_nacimiento",$fecha_nacimiento); 
            $stament->bindParam(":tipo_identificacionid",$tipo_identificacionid);
            $stament->bindParam(":identificacionid",$identificacionid);
            $stament->bindParam(":sexoid",$sexoid);
            $stament->bindParam(":cuil",$cuil);
            $stament->bindParam(":estado_civil",$estado_civil);
            $stament->bindParam(":usuarioid",$usuarioid);
            $stament->bindParam(":fecharegistro",$fecharegistro);
            return($stament->execute()) ? $personaid : false;
        }
        public function show($id){
            $stament = $this->PDO->prepare("SELECT * FROM adma_persona where baja = 0 and personaid = :id limit 1");
            $stament->bindParam(":id" , $id);
            return($stament->execute()) ? $stament->fetch() : false ;
        }
        public function show_i0($id){
            $stament = $this->PDO->prepare("SELECT * FROM adma_persona_i0 where baja = 0 and personaid = :id limit 1");
            $stament->bindParam(":id" , $id);
            return($stament->execute()) ? $stament->fetch() : false ;
        }
        public function index(){
            $stament = $this->PDO->prepare("SELECT adma_persona.nombre, adma_persona.apellido , adma_persona_i0.*  FROM adma_persona inner join adma_persona_i0 on adma_persona_i0.personaid = adma_persona.personaid  where adma_persona_i0.baja = 0");
            return($stament->execute()) ? $stament->fetchAll() : false ;
        }
        public function update($personaid, $fecha_nacimiento,$tipo_identificacionid,$identificacionid,$sexoid,$cuil,$estado_civil,$usuarioid,$fecharegistro){
            $stament = $this->PDO->prepare("UPDATE adma_persona_i0 SET fecha_nacimiento= :fecha_nacimiento,tipo_identificacionid= :tipo_identificacionid,identificacionid= :identificacionid,sexoid= :sexoid,cuil= :cuil,estado_civil= :estado_civil,usuarioid = :usuarioid, fecharegistro= :fecharegistro where personaid = :personaid");
            $stament->bindParam(":personaid" , $personaid);
            $stament->bindParam(":fecha_nacimiento",$fecha_nacimiento);
            $stament->bindParam(":tipo_identificacionid" , $tipo_identificacionid,PDO::PARAM_INT);
            $stament->bindParam(":identificacionid" , $identificacionid);
            $stament->bindParam(":sexoid" , $sexoid,PDO::PARAM_INT);
            $stament->bindParam(":cuil" , $cuil);
            $stament->bindParam(":estado_civil" , $estado_civil,PDO::PARAM_INT);
            $stament->bindParam(":usuarioid" , $usuarioid,PDO::PARAM_INT);
            $stament->bindParam(":fecharegistro" , $fecharegistro);
            return($stament->execute()) ? $personaid : false ;
        }
        public function delete($personaid){
            $stament = $this->PDO->prepare("UPDATE adma_persona_I0 SET baja= 1 where personaid = :personaid ");
            $stament->bindParam(":personaid" , $personaid);
            return($stament->execute()) ? $personaid : false ;
        }
    }
?>