<?php
            class tbl_member_controller {
                private $model;
                public function __construct(){
                    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/model/tbl_member_model.php");
                    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
                
                    $this->model = new tbl_member_model();
                }
                public function guardar($username,$name,$password,$create_at){
                    $id= $this->model->insertar($username,$name, $password,$create_at);
                    return($id!=false) ? header("Location:show.php?id=".$id) : header("Location:create.php");
                }
                public function show($id){
                    return($this->model->show($id) != false) ? $this->model->show($id) : header("Location:index.php");
                }
                public function index(){
                    return($this->model->index() != false) ? $this->model->index() : false;
                }
                public function actualizar($id, $username,$name,$password,$create_at){
                    $id= $this->model->update($id, $username,$name,$password,$create_at);
                    $db = new db();
                    return($id!=false) ? header("Location:show.php?id=".$db->codificar_valor($id,1)) : header("Location:index.php");
                }
                public function borrar($id){
                    $id= $this->model->delete($id);
                    $db = new db();
                    return($id!=false) ?  header("Location:index.php") : header("Location:show.php?id=". $db->codificar_valor($id,1));
                }
            }
?>