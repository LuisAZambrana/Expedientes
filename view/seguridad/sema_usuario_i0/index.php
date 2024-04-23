<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM tbl_member WHERE id=".$_GET['id'];
    $date= $obj->fcGetSQL($sql,1,2);
    $ruta="/proyecto/view/tbl_member/";
    $ruta_i0="/proyecto/view/seguridad/sema_usuario_i0/";
?>
<section id="rolespersonas">
      <div class="container">
        <div class="section-title">
          <h2>Roles de Usuarios</h2>
          <p>Cargar, editar y borrar Roles de Usuarios</p>
        </div>
        <div class="container" data-aos="fade-up">
    
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">UsuarioId</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="listaid" name="id" value="<?= $_GET['id'] ?>">
        </div>
    </div> 
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre Usuario</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="username" name="id" value="<?= $date['username'] ?>">
        </div>
    </div> 
<div class="pb-3">
    <a href=<? echo($ruta."index.php"); ?> class="btn btn-primary"> Regresar </a>
</div>
        </div>
<div>
   <?php
        echo($obj->configurar_grilla_param_alta(19," baja = 0 and personaid = ".$_GET['id'],$ruta_i0,$_GET['id']));
   ?>
</div>

    </div>

</div>

<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>