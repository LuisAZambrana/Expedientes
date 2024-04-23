<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/tbl_member_controller.php");
     $obj = new tbl_member_controller();
     $obj->borrar($_GET['id']);
?>