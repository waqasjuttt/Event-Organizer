<?php
	
	class DbOperations{
 
        private $con; 
 
        function __construct(){
 
            require_once dirname(__FILE__).'/DbConnect.php';
 
            $db = new DbConnect();
 
            $this->con = $db->connect();
 
        }
 
        /*CRUD -> C -> CREATE */
 
        public function createUser($username, $pass, $email, $mobile){
            if($this->isUserExist($username,$email,$mobile)){
                return 0; 
            }else{
                // if($con)
                // {
                //     $image = $_POST["image"];
                //     $name = $_POST["name"];
                //     $sql = "insert into imageinfo(username) values('$username')";
                //     $upload_path = "UploadedData/$username.jpg";

                //     if(mysqli_query($con,$sql))
                //     {
                //         file_put_contents($upload_path,base64_decode($image));
                //         echo json_encode(array('response'=>'Image uploaded successfully'));
                //     }
                //     else
                //     {
                //         echo json_encode(array('response'=>'Image upload failed'));
                //     }
                // }
                // else
                // {
                //     echo json_encode(array('response'=>'Image upload Failed'));
                // }

////////////////////////////////////////////////////////////////////////////////////////////////////////////
                
                $password = md5($pass);
                $stmt = $this->con->prepare("INSERT INTO `promousers` (`id`, `username`, `password`, `email`, `mobile`) VALUES (NULL, ?, ?, ?, ?);");
                $stmt->bind_param("ssss",$username,$password,$email,$mobile);
 
                if($stmt->execute()){
                    return 1; 
                }else{
                    return 2; 
                }
            }
        }

        public function userLogin($email,$pass){
            $password = md5($pass);
            $stmt = $this->con->prepare("SELECT id FROM customer_personal WHERE email = ? 
                AND password = ?");
            $stmt->bind_param("ss",$email,$password);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows > 0;
        }    

        public function EditUser($username,$mobile,$email){
            $stmt = $this->con->prepare("SELECT * FROM customer_personal WHERE username = ? OR mobile = ? OR email = ?");
            $stmt->bind_param("sss",$username,$mobile,$email);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows > 0;
        }

        public function getUserByUsername($email){
            $stmt = $this->con->prepare("SELECT * FROM customer_personal WHERE email =?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }
 
        private function isUserExist($username, $email, $mobile){
            $stmt = $this->con->prepare("SELECT id FROM customer_personal WHERE username = ? OR email = ? OR mobile = ?");
            $stmt->bind_param("sss", $username, $email, $mobile);
            $stmt->execute(); 
            $stmt->store_result(); 
            return $stmt->num_rows > 0; 
        }
}
?>