<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/tbl_member_controller.php");
require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
$db = new db();
$obj = new tbl_member_controller();
if ($_POST["password"] != $_POST["confirmar"]) 
  {
              $_SESSION["_username"] = $_POST["username"];
              $_SESSION["_name"] = $_POST["name"];
              $_SESSION["_password"] = $_POST["password"];
              $_SESSION["_confirmar"] = $_POST["confirmar"];
              header("Location:create.php?err=1"); 
  }
else
  {
    $obj->guardar($_POST["username"],$_POST["name"],password_hash($_POST["password"],PASSWORD_DEFAULT),date('Y-m-d\TH:i:sP'));
  } 
?>