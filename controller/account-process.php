    <?php 
    include '../model/signup.php';
    include '../functions/sign_up.php';
session_start();
$errors2 = array();
$obj = $_SESSION['obj'];
$log = 1;

function back($errors2)
{
    $_SESSION['errors2']=$errors2;
    header("Location:../account.php");
}
      if (isset($_POST['safe']))
      {
          try {
              $password = $_POST['password'];
              $cpassword = $_POST['cpassword'];
              $obj->set_password($password,$cpassword);
              
          } catch (Exception $ex) {
              $errors2['password'] = $ex->getMessage();
                $log = 0;
                back($errors2);
     
          }
          try {
              $obj->captcha();
          } catch (Exception $ex) {
              $errors2['captcha'] = $ex->getMessage();
                $log = 0;
                back($errors2);
          }
          
      }
      
  $domain = $_SESSION['domain'];
  if ($domain == "customer")
  {
      if($log == 1){
         
    $act_code = md5(crypt(rand(), "aa"));
    $msg= "Activate Button send to your mail";
    $_SESSION['msg']= $msg;
    $obj->register_customer($act_code);
    $msg_email = "Click to <a href='http://localhost/test-components/activate.php?act_code=$act_code&user_ID=$obj->user_id'>"
            . "<input type='button' value='Active'></a>" ;
    $_SESSION['msg_email']= $msg_email;
  Web_Interface::send_mail($msg_email);
    header("Location: ../message.php");   
      }    
}
 elseif ($domain == "contractor") {
     if($log == 1){
      $act_code = md5(crypt(rand(), "aa"));
    $msg= "Activate Button send to your mail";
    $_SESSION['msg']= $msg;
    $obj->register_contractor($act_code);
    $email=$obj->get_email();
    $name=$obj->get_first_name();
    $msg_email = "welcome $name please Click to <a href='http://localhost/test-components/activate.php?act_code=$act_code&user_ID=$obj->user_id'>"
            . "<input type='button' value='Active'></a>" ;
    $_SESSION['msg_email']= $msg_email;
  Web_Interface::send_mail($msg_email , $email , $name);
    header("Location: ../message.php");
     }
  }
else{
    $msg="__Failed";
    $_SESSION['msg']= $msg;
    $_SESSION['errors']= $errors;
    $_SESSION['obj_user']= $obj_user;
   header("Location: ../signup.php");
}
  

    ?>
    