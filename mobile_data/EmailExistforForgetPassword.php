<?php
require_once 'DbOperation.php';
 
$response = array(); 
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['email']))
        {
        $db = new DbOperations();
 
        $result = $db->isEmailExistForForgetPassword($_POST['email']);
        
        if($result == 1){
            $user = $db->getUserByEmail($_POST['email']);
            $response['error'] = true;
            $response['mobile_number'] = $user['mobile_number'];
            $response['cnic'] = $user['cnic'];
            $response['message'] = "Email exist";
        }
    else{
        $response['error'] = false; 
        $response['message'] = "Email not exist";
    }        
    }
        
}else{
    $response['error'] = true; 
    $response['message'] = "Invalid Request";
}
 
echo json_encode($response);
?>