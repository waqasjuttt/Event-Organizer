<?php

include_once '../model/signup.php';
include_once '../functions/sign_up.php';
$obj = new signup();
$errors = array() ;
session_start();
    $log = 1;
function back($errors)
{
    $_SESSION['errors'] = $errors;
    header('Location:../forget-password.php');
}
if(isset($_POST['pass']))
{
    $email = $_POST['email'];
    $cnic = $_POST['cnic'];
    $domain = $_POST['domain'];
    try {
        $obj->set_email($email);
    } catch (Exception $ex) {
        $errors['email'] = $ex->getMessage();
        $log=0;
        back($errors);
    }
   try {
        $obj->set_cnic($cnic);
    } catch (Exception $ex) {
        $errors['cnic'] = $ex->getMessage();
        $log=0;
        back($errors);
    }
    try {
        $obj->set_domain($domain);
    } catch (Exception $ex) {
        $errors['domain'] = $ex->getMessage();
        $log=0;
        back($errors);
    }
    //echo $email;
    
    if($log === 1)
    {
       // $act_code = md5(crypt(rand(), "aa"));
    $msg= "Reset Password Button send to your mail ";
    $_SESSION['msg']= $msg;
    try {
        $obj->check($email, $cnic, $domain);
    } catch (Exception $ex) {
        $errors['result']=$ex->getMessage();
        $log=0;
        back($errors);
    }
    $id = $obj->get_user_id();
    $fname = $obj->get_first_name();
    $cnic = $obj->get_cnic();
    $category = $obj->get_category();
    if($id!=0)
    {
    $msg_email = "<h1>Asalamoalaikum $fname</h1>"
            . "<b>Click to <a href='http://localhost/test-components/reset_form.php?domain=$category & user_ID=$id'>"
            . "<input type='button' value='Reset Password'></a> to change for your password of CNIC $cnic as a $category</b>" ;
    $_SESSION['msg_email']= $msg_email;
  Web_Interface::send_mail($msg_email , $email , $fname);
    header("Location: ../message.php"); 
    }
    }
     
}
   

 else {
    echo 'not transfer';
}
$_SESSION['obj']=$obj;

//session_destroy();
?>