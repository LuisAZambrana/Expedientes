<?php
            class adma_persona_controller {
                private $model;
                public function __construct(){
                    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/model/adma_persona_model.php");
                    $this->model = new adma_persona_model();
                }
                public function guardar($_nombre,$_apellido){
                    $id= $this->model->insertar($_nombre,$_apellido);
                    return($id!=false) ? header("Location:show.php?id=".$id) : header("Location:create.php");
                }

                public function show($id){
                    return($this->model->show($id) != false) ? $this->model->show($id) : header("Location:index.php");
                }
                public function index(){
                    return($this->model->index() != false) ? $this->model->index() : false;
                }

                public function actualizar($_personaid,$_nombre,$_apellido, $_baja){
                    $id= $this->model->update($_personaid,$_nombre,$_apellido,$_baja);
                    return($id!=false) ? header("Location:show.php?id=".$id) : header("Location:/proyecto/index.php");
                }
                public function borrar($_personaid){
                    $id= $this->model->delete($_personaid);
                    return($id!=false) ?  header("Location:/proyecto/index.php#personas") : header("Location:show.php?id=".$id);
                }
            }
?>