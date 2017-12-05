<?php
include '../model/signup.php';

session_start();
$errors1 = array();
//$obj = new signup();
$obj = $_SESSION['obj'];
$log = 1;

function back($errors1)
{
    $_SESSION['errors1']=$errors1;
    header("Location:../companyinfo.php");
}
function call($log)
{
    if($log===1)
{
        header ("Location:../account.php");
}
}
if (isset($_POST['save']))
{
   try{
    $company_name = $_POST['company-name'];
    $obj->set_company_name($company_name);
   }
    catch (Exception $ex)
 {
     $errors1['company_name'] = $ex->getMessage();
     $log = 0;
     back($errors1);
  }
  try {
        $reg_number=$_POST['reg_number'];
         $obj->set_reg_number($reg_number);
     } catch (Exception $ex) {
         $errors1['reg_number'] = $ex->getMessage();
         $log = 0;
         back($errors1);
     }
     try {
         $company_telephone = $_POST['company-telephone'];
         $obj->set_company_telephone($company_telephone);
     } catch (Exception $ex) {
         $errors1['company_telephone']=$ex->getMessage();
         $log = 0;
         back($errors1);
     }


try {
    $option = $_POST['city'];
    $obj->set_city($option);
} catch (Exception $ex) {
     $errors1['city']=$ex->getMessage();
     $log = 0;
         back($errors1);
}try {
    $company_address = $_POST['company_address'];
    $obj->set_company_address($company_address);
} catch (Exception $ex) {
    $errors1['company_address']= $ex->getMessage();
    $log = 0;
    back($errors1);
}
try {
    $fax_number = $_POST['fax_number'];
    $obj->set_fax_number($fax_number);
} catch (Exception $ex) {
    $errors1['fax_number'] = $ex->getMessage();
    $log = 0;
    back($errors1);
}
try
{
    $company_email = $_POST['company_email'];
    $obj->set_company_email($company_email);
} catch (Exception $ex) {
    $errors1['company_email'] = $ex->getMessage();
    $log = 0;
    back($errors1);
}
try {
    $website = $_POST['website'];
    $obj->set_website($website);
} catch (Exception $ex) {
    $errors1['website'] = $ex->getMessage();
    $log = 0;
    back($errors1);
}
try {
    $c_about = $_POST['c_about'];
    $obj->set_c_about($c_about);
    
} catch (Exception $ex) {
    $errors1['c_about'] = $ex->getMessage();
    $log = 0;
    back($errors1);
}
try{
   $company_image=($_FILES['company_image']);
    $obj->set_company_image($company_image);
}
 catch (Exception $ex){
     $errors1['company_image'] = $ex->getMessage();
     $log = 0;
     back($errors1);
 }
 
 call($log);
}
$_SESSION['obj']=$obj;
//header("Location:../companyinfo.php");
?>