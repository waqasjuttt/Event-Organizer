<?php
require_once 'DbOperation.php';
 
$response = array(); 
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['id']) and
        isset($_POST['first_name']) and
            isset($_POST['last_name']) and
                isset($_POST['email']) and
                    isset($_POST['cnic']) and
                        isset($_POST['mobile_number']) and
                            isset($_POST['date_of_birth']) and
                                isset($_POST['geneder']) and
                                    isset($_POST['interests']) and
                                        isset($_POST['about']) and
                                            isset($_POST['telephone_number']) and 
                                                isset($_POST['address']))
        {
        //operate the data further 
 
        $db = new DbOperations();
 
        $result = $db->EditUser(    $_POST['id'],
                                    $_POST['first_name'],
                                    $_POST['last_name'],
                                    $_POST['email'] ,
                                    $_POST['cnic'] ,
                                    $_POST['mobile_number'] ,
                                    $_POST['date_of_birth'] ,
                                    $_POST['geneder'] ,
                                    $_POST['interests'] ,
                                    $_POST['about'] ,
                                    $_POST['telephone_number'] ,
                                    $_POST['address']
                                );
        if($result == 1){
            $response['error'] = false;
            $response['message'] = "Profile update successfully";
        }
        else{       
            $response['error'] = true; 
            $response['message'] = "Profile not updated";
        }
    }
}else{
    $response['error'] = true; 
    $response['message'] = "Invalid Request";
}
 
echo json_encode($response);
?>