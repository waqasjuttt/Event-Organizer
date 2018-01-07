<?php
	require_once 'DbOperation.php';
 
$response = array(); 
$arr = array();
 
if($_SERVER['REQUEST_METHOD']=='POST'){
	if (isset($_POST['email']) and isset($_POST['password']) and ($_POST['domain'])) {
		$db = new DbOperations();

		if ($db->userLogin($_POST['email'], $_POST['password'], $_POST['domain'])) {
			$user = $db->getUserByEmail($_POST['email']);
			
                        $response['error'] = false;
                        
			$response['id'] = $user['id'];
			$response['first_name'] = $user['first_name'];
			$response['last_name'] = $user['last_name'];
			$response['email'] = $user['email'];
                        $response['mobile_number'] = $user['mobile_number'];
                        $response['cnic'] = $user['cnic'];
                        $response['date_of_birth'] = $user['date_of_birth'];
                        $response['geneder'] = $user['geneder'];
                        $response['interests'] = unserialize($user['interests']);
                        $response['address'] = $user['address'];
                        $response['telephone_number'] = $user['telephone_number'];
//                        $response['active'] = $user['active'];
//                        $response['timestamp'] = $user['timestamp'];
//                        $response['ip_address'] = $user['ip_address'];
                        $response['about'] = $user['about'];
                        $response['domain'] = $user['domain'];
                        
		}else{
			$response['error'] = true;
                        $response['message'] = "Inavlid Email or Password";
		}
	}else{
		$response['error'] = true;
		$response['message'] = "Required fields are missing";
	}
}
echo json_encode($response);
?>