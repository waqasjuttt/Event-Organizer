<?php
include '../model/signup.php';
    include '../functions/sign_up.php';
session_start();
$errors = array();
//$obj = $_SESSION['obj'];
$obj = new signup();
$log = 1;
$id;
$domain;

function back($errors)
{
    $_SESSION['errors']=$errors;
    header("Location:../reset_form.php");
}
      if (isset($_POST['safe']))
      {
          try {
              $password = $_POST['password'];
              $cpassword = $_POST['cpassword'];
              $obj->set_password($password,$cpassword);
              
          } catch (Exception $ex) {
              $errors['password'] = $ex->getMessage();
                $log = 0;
                back($errors);
     
          }
          try {
              $obj->captcha();
          } catch (Exception $ex) {
              $errors['captcha'] = $ex->getMessage();
                $log = 0;
                back($errors);
          }
          $id= $_POST['id'];
          $domain =  $_POST['domain'];
          
      }

     if ($log === 1)
      {
         // echo $id;
         // echo $domain;
       $obj->set_user_id($id);
         // $domain = $_SESSION['domain'];
          $obj->set_category($domain);
         $obj->reset();
        
        // echo $t;
       
         //header("Location:../index.php");
      
      }
$_SESSION['obj']= $obj;

?>