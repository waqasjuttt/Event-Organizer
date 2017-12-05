<?php
include_once '../model/signup.php';
$obj = new signup();
$errors = array();
$log = 1;
$key =0;
$re="";
$r;
session_start();
function back($errors)
{
    $_SESSION['errors'] = $errors;
    header('Location:../index.php');
}
function go($key)
{
    if ($key == 1)
    {
        header('Location:../customer.php');
    } elseif($key == 0) {
        header('Location:../contractor.php');
    }
    else {
    echo 'wrong';
    }
}
//echo '<h1> Welcome Fahad </h1>';
if(isset($_POST['login']))
{
    $cnic = $_POST['cnic'];
    $password = $_POST['password'];
    $domain = $_POST['domain'];
  /* $remember = "no";
    if(isset( $_POST['remember']))
    {
        $remember = $_POST['remember'];
    }*/
    try {
        $obj->set_cnic($cnic);   
     } catch (Exception $ex) {
        $errors['cnic'] = $ex->getMessage();
        $log = 0;
        back($errors);
    }
    
    if (isset($_POST['re']))
    {
        $re="on";
    } else {
        $re="off";
    }
    //$pattern = "/^[customer]/";
        
   // if (preg_match($pattern,$domain))
    if($domain == "customer")
    {
        $key = 1;
        echo $domain;
    }
    else
    {
       $key = 0;
    }
    try {
        $obj->check_password($key , $password);
    } catch (Exception $ex) {
        $errors['pass'] = $ex->getMessage();
        $log = 0;
        back($errors);
    }
    try
    {
       $r= $obj->login($key,$password);
    } catch (Exception $ex) {
        $errors['query'] = $ex->getMessage();
        $log = 0;
        back($errors);
    }
    if($r == 1)
    {
    if($re == "on")
    {
        $id=$obj->get_id();
        $cnic =$obj->get_cnic();
        setcookie("id",$id,time()+(86400*10),'/');
        setcookie("cnic",$cnic,time()+(86400*10),'/');
       // exit();
      //  echo $id;
       
       go($key);
       //echo 'good';
        
        
    } elseif ($re == "off") {
    

        $_SESSION['firstname'] = $obj->get_first_name();
        $_SESSION['lastname'] = $obj->get_last_name();
        $_SESSION['cnic'] = $obj->get_cnic();
        $_SESSION['ip'] = $obj->get_ip();
        $_SESSION['date_of_birth'] = $obj->get_date_of_birth();
        $_SESSION['time'] = $obj->get_timestamp();
      go($key);
    }
    }
 else {
    $errors['query'] = "Not Run"; 
    }
    }
$_SESSION['obj'] = $obj;

?>