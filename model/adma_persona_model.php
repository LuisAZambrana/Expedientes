<?php
    class adma_persona_model {
        private $PDO;
        public function __construct(){
            require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
            $con= new db();
            $this->PDO = $con->conexion_1();
        }
        public function insertar($nombre, $apellido){
            $stament = $this->PDO->prepare("INSERT INTO adma_persona(personaid,nombre,apellido,baja,usuarioid,fecharegistro) VALUES(null,:nombre,:apellido,0,null,null)");
            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":apellido",$apellido);  
            return($stament->execute()) ? $this->PDO->lastInsertId() : false;
        }
        public function show($id){
            $stament = $this->PDO->prepare("SELECT * FROM adma_persona where personaid = :id limit 1");
            $stament->bindParam(":id" , $id);
            return($stament->execute()) ? $stament->fetch() : false ;
        }
        public function index(){
            $stament = $this->PDO->prepare("SELECT * FROM adma_persona  where baja = 0");
            return($stament->execute()) ? $stament->fetchAll() : false ;
        }
        public function update($personaid, $nombre, $apellido, $baja){
            $stament = $this->PDO->prepare("UPDATE adma_persona SET nombre= :nombre , apellido= :apellido , baja= :baja where personaid = :personaid ");
            $stament->bindParam(":personaid" , $personaid);
            $stament->bindParam(":nombre" , $nombre);
            $stament->bindParam(":apellido" , $apellido);
            $stament->bindParam(":baja" , $baja,PDO::PARAM_INT);
            return($stament->execute()) ? $personaid : false ;

        }
        public function delete($personaid){
            $stament = $this->PDO->prepare("UPDATE adma_persona SET baja= 1 where personaid = :personaid ");
            $stament->bindParam(":personaid" , $personaid);
            return($stament->execute()) ? $personaid : false ;
        }
    }
?>