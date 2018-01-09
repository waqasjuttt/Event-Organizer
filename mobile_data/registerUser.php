<?php
require_once 'DbOperation.php';
 
$response = array(); 
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(
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
                                                isset($_POST['address']) and
                                                    isset($_POST['password']))
        {
        //operate the data further 
 
        $db = new DbOperations();
 
        $result = $db->createUser(  $_POST['first_name'],
                                    $_POST['last_name'],
                                    $_POST['email'] ,
                                    $_POST['cnic'] ,
                                    $_POST['mobile_number'] ,
                                    $_POST['date_of_birth'] ,
                                    $_POST['geneder'] ,
                                    $_POST['interests'] ,
                                    $_POST['about'] ,
                                    $_POST['telephone_number'] ,
                                    $_POST['address'] ,
                                    $_POST['password']
                                );

        if($result == 1){
            $response['error'] = false; 
            $response['message'] = "User registered successfully";
        }
        else if($result == 2){
            $response['error'] = true; 
            $response['message'] = "Some error occurred please try again";
        }
        else if($result == 0){
            $response['error'] = true; 
            $response['message'] = "It seems you are already registered, please choose a different CNIC or Email address";
        }
    }
    else{
        $response['error'] = true; 
        $response['message'] = "Required fields are missing";
    }
}else{
    $response['error'] = true; 
    $response['message'] = "Invalid Request";
}
 
echo json_encode($response);
?>