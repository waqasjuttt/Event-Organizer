<?php
//include 'model/signup.php';
session_start();

session_destroy();


setcookie("id",$id,time()-(86400*10),'/');
setcookie("cnic",$cnic,time()-(86400*10),'/');

header('Location:index.php');

?>
