<?php
include '../model/signup.php';


session_start();
$errors = array();
$obj = new signup();
$log = 1;
function back($errors)
{
 $_SESSION['errors']= $errors;   
header("Location:../personal.php");
}
function call($log)
{
    if($log===1)
{
$domain = $_SESSION['domain'];
if ($domain == "customer")
{
    $_SESSION['obj']=$obj;
    header ("Location:../account.php");
}
 else {
     $_SESSION['obj']=$obj;
   header ("Location:../companyinfo.php");
}}
}
if(isset($_POST['safe'])) // first if start
{
    //first name validation
    try {
       $first_name=$_POST['first-name'];
        $obj->set_first_name($first_name);
    } catch (Exception $ex) {
        $errors['first_name']=$ex->getMessage();
        $log = 0;
        back($errors);
        
    }
    
          //last name validation
   
    try {
       $last_name=$_POST['last-name'];
        $obj->set_last_name($last_name);
    } catch (Exception $ex) {
        $errors['last_name']=$ex->getMessage();
       // $_SESSION['errors']= $errors;
        $log = 0;
        back($errors);
    }
          
      //Email validation    
   
   try {
       $email=$_POST['email'];
       $obj->set_email($email);
   } catch (Exception $ex) {
       $errors['email'] = $ex->getMessage();
       $log = 0;
       back($errors);
   }
     
          //CNIC validation
          try {
              $cnic=$_POST['cnic'];
              $obj->set_cnic($cnic);
          } catch (Exception $ex) {
              $errors['cnic'] = $ex->getMessage();
              back($errors);
          }
          //mobile number validation
          try {
              $m_number=$_POST['m-number'];
              $obj->set_m_number($m_number);
          } catch (Exception $ex) {
              $errors['m_number'] = $ex->getMessage();
              $log = 0;
              back($errors);
          }
         //geneder validatiobn 
          
         try {
             $interests=$_POST['interests'];
              $obj->set_interests($interests);
         } catch (Exception $ex) {
             $errors['interests'] = $ex->getMessage();
             $log = 0;
             back($errors);
         }
         try {
           $geneder = $_POST['geneder'];
           $obj->set_geneder($geneder);
         } catch (Exception $ex) {
              $errors['geneder'] = $ex->getMessage();
              $log = 0;
              back($errors);
         }
   
   //about validation
          try{
              $about = $_POST['about'];
              $obj->set_about($about);
          } catch (Exception $ex) {
              $errors['about'] = $ex->getMessage();
              $log = 0;
              back($errors);
          }
        //Telephone number validtation
   
    
   try{
              $telephone=$_POST['telephone'];
              $obj->set_telephone($telephone);
          } catch (Exception $ex) {
              $errors['telephone'] = $ex->getMessage();
              $log = 0;
              back($errors);
          }
   try
   {
       $day=$_POST['day'];
       $month=$_POST['month'];
       $year=$_POST['year'];
       $d= "$day-$month-$year";   
       $obj->set_date_of_birth($d);  
   } catch (Exception $ex) {
       $errors['date_of_birth'] = $ex->getMessage();
              $log = 0;
              back($errors);
   }
    try{
              $address=$_POST['address'];
              $obj->set_address($address);
          } catch (Exception $ex) {
              $errors['address'] = $ex->getMessage();
              $log = 0;
              back($errors);
          }
         
          if ($_FILES['profile_image'] != NULL)
          {
try{
  $a=0;
$obj->set_profile_image($_FILES['profile_image']);
}
 catch (Exception $e){
     $errors['profile_image'] = $e->getMessage();
     $log = 0;
     back($errors);
 }
          }
       // header('Location:../companyinfo.php');
 //$log=1;
 
 call($log);
}

 else //else of first if
 {
    die('Data Not Transfered');
}
//$_SESSION['p'] = $_FILES["profile_image"];
$_SESSION['obj']=$obj;
?>



