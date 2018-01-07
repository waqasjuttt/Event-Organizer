<?php
require_once 'DbOperation.php';
 
$response = array(); 
 
if($_SERVER['REQUEST_METHOD']=='POST')
    {
    if(isset($_POST['email']) and isset($_POST['password']))
        {
            $db = new DbOperations();
 
            $result = $db->createNewPassword($_POST['email'], $_POST['password']);
            
            if($result == 1)
            {
                $response['error'] = true; 
                $response['message'] = "Successfully Changed Password";
            }
            else
            {
                $response['error'] = false;
                $response['message'] = "Password not Updated, Check your Email Address";
            } 
        }
    }
else{
    $response['error'] = true; 
    $response['message'] = "Required fields are missing";
}
 
echo json_encode($response);
?>