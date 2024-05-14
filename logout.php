<?php
 //session_start();
 //session_destroy();
 $err = '';
 $url = "./login.php";
 if (! empty($_GET['err'])){ 
   if ($_GET['err'] == 'off'){
    $err = "?err='Session caducada!'".
    $url.=$err;
   }
 }
 header("Location:$url");
?>