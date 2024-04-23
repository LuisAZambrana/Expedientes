<?php
            class adma_persona_i0_controller {
                private $model;
                public function __construct(){
                    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/model/adma_persona_i0_model.php");
                    $this->model = new adma_persona_i0_model();
                }
                public function guardar($personaid, $fecha_nacimiento,$tipo_identificacionid,$identificacionid,$sexoid,$cuil,$estado_civil,$usuarioid,$fecharegistro){
                    $id= $this->model->insertar($personaid, $fecha_nacimiento,$tipo_identificacionid,$identificacionid,$sexoid,$cuil,$estado_civil,$usuarioid,$fecharegistro);
                    return($id!=false) ? header("Location:show.php?id=".$id) : header("Location:create.php");
                }
                public function show($id){
                    return($this->model->show($id) != false) ? $this->model->show($id) : header("Location:index.php");
                }
                public function show_i0($id){
                    return($this->model->show_i0($id) != false) ? $this->model->show_i0($id) :false;
                }
                public function index(){
                    return($this->model->index() != false) ? $this->model->index() : false;
                }
                public function actualizar($personaid, $fecha_nacimiento,$tipo_identificacionid,$identificacionid,$sexoid,$cuil,$estado_civil,$usuarioid,$fecharegistro){
                    $id= $this->model->update($personaid, $fecha_nacimiento,$tipo_identificacionid,$identificacionid,$sexoid,$cuil,$estado_civil,$usuarioid,$fecharegistro);
                    return($id!=false) ? header("Location:show.php?id=".$id) : header("Location:/proyecto/index.php");
                }
                public function borrar($_personaid){
                    $id= $this->model->delete($_personaid);
                    return($id!=false) ?  header("Location:/proyecto/index.php#personas") : header("Location:show.php?id=".$id);
                }
            }
?>