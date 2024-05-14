<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/tbl_member_controller.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj = new tbl_member_controller();
     $db = new db();
     $_GET['id']= $db->codificar_valor( $_GET['id'],0);
     $obj->borrar($_GET['id']);
?>