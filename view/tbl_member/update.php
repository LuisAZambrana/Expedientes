<?php 
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/tbl_member_controller.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $db = new db();
     $obj = new tbl_member_controller();
     $obj->actualizar($_POST["id"],$_POST["username"],$_POST["name"],password_hash($_POST["password"],PASSWORD_DEFAULT),date('Y-m-d\TH:i:sP'));
?>