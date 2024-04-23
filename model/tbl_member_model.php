<?php
    class tbl_member_model {
        private $PDO;
        public function __construct(){
            require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
            $con= new db();
            $this->PDO = $con->conexion_1();
        }
        public function insertar($username,$name,$password,$create_at){
            $stament = $this->PDO->prepare("INSERT INTO tbl_member(id,username,name,password,create_at) VALUES(null,:username,:name,:password,:create_at)");
            $stament->bindParam(":username",$username);
            $stament->bindParam(":name",$name);  
            $stament->bindParam(":password",$password); 
            $stament->bindParam(":create_at",$create_at); 
            return($stament->execute()) ? $this->PDO->lastInsertId() : false;
        }
        public function show($id){
            $stament = $this->PDO->prepare("SELECT * FROM tbl_member where id = :id limit 1");
            $stament->bindParam(":id" , $id);
            return($stament->execute()) ? $stament->fetch() : false ;
        }
        public function index(){
            $stament = $this->PDO->prepare("SELECT * FROM tbl_member");
            return($stament->execute()) ? $stament->fetchAll() : false ;
        }
        public function update($id, $username, $name, $password,$create_at){
            $stament = $this->PDO->prepare("UPDATE tbl_member SET username= :username, name= :name, password= :password, create_at= :create_at where id = :id ");
            $stament->bindParam(":id" , $id);
            $stament->bindParam(":username" , $username);
            $stament->bindParam(":name" , $name);
            $stament->bindParam(":password" , $password);
            $stament->bindParam(":create_at" , $create_at);
            return($stament->execute()) ? $id : false ;

        }
        public function delete($id){
            $stament = $this->PDO->prepare("DELETE FROM tbl_member where id = :id ");
            $stament->bindParam(":id" , $id);
            return($stament->execute()) ? $id : false ;
        }
    }
?>