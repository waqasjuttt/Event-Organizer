<?php
	
	class DbOperations{
 
        private $con; 
 
        function __construct(){
 
            require_once dirname(__FILE__).'/DbConnect.php';
 
            $db = new DbConnect();
 
            $this->con = $db->connect();
 
        }
 
        /*CRUD -> C -> CREATE */
 
        public function createUser($first_name, $last_name, $email, $cnic, $mobile_number, $dob, $gender, $interests, $about, $telephone_number, $address, $pass){
            if($this->isUserExist($cnic, $email)){
                return 0; 
            }else{
                
//                $act_code = md5(crypt(rand(), "aa"));
//                $ip = $_SERVER['REMOTE_ADDR'];
                
//                $query =" INSERT INTO `customer_personal` (`first_name`, `last_name`, `email`, `cnic`, `mobile_number`, "
//               . "`date_of_birth`, `geneder`, `interests`, `about`, `telephone_number`, `address`, `password`, "
//                . "`active`, `reset_code`, `timestamp`, `ip_address`) VALUES "
//                . "('$this->first_name','$this->last_name','$this->email','$this->cnic','$this->m_number',"
//                . "'$this->date_of_birth','$this->geneder','".serialize($this->interests)."','$this->about',"
//               . "'$this->telephone','$this->address','$this->profile_image',"
//                . "'$this->password',0,'$act_code',NOW(),'$ip')";
//                $result=$conn->query($query );
        

//                $timestamp = NOW();
                $UserInterests = serialize($interests);                
                $password = md5($pass);
                $stmt = $this->con->prepare("INSERT INTO `customer_personal` (`id`, `first_name`, `last_name`, `email`, `cnic`, `mobile_number`, `date_of_birth`, `geneder`, `interests`, `about`, `telephone_number`, `address`, `password`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
                $stmt->bind_param("ssssssssssss",$first_name, $last_name, $email, $cnic, $mobile_number, $dob, $gender, $UserInterests, $about, $telephone_number, $address, $password);
 
                if($stmt->execute()){
                    return 1; 
                }else{
                    return 2; 
                }
            }
        }
        
        public function getUserByEmail($email){
            $stmt = $this->con->prepare("SELECT * FROM customer_personal WHERE email =?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }
 
        private function isUserExist($cnic, $email){
            $stmt = $this->con->prepare("SELECT id FROM customer_personal WHERE cnic = ? OR email = ? ");
            $stmt->bind_param("ss", $cnic, $email);
            $stmt->execute(); 
            $stmt->store_result(); 
            return $stmt->num_rows > 0; 
        }

        public function userLogin($email,$pass,$domain){
            $password = md5($pass);
            $stmt = $this->con->prepare("SELECT id FROM customer_personal WHERE email = ? 
                AND password = ? AND domain = ?");
            $stmt->bind_param("sss",$email,$password,$domain);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows > 0;
        }
        
        private function isEmailExist($email){
            $stmt = $this->con->prepare("SELECT id FROM customer_personal WHERE email = ?");
            $stmt->bind_param("s",$email);
            $stmt->execute(); 
            $stmt->store_result(); 
            return $stmt->num_rows > 0; 
        }
        
        public function isEmailExistForForgetPassword($email){
            if($this->isEmailExist($email)){
                return 1; 
            }else{        
               return 0;
            }
        }
        
        public function createNewPassword($email, $pass)
        {
            if($this->isEmailExistForForgetPassword($email)){
                $password = md5($pass);
                $stmt = $this->con->prepare("UPDATE customer_personal SET password = ? WHERE email = ?");
                $stmt->bind_param("ss",$password, $email);
                if($stmt->execute()){
                    return 1;
                }else{
                    return 2;
                }
            }
            else
            { 
                return 0; 
            }           
        }
        
        public function EditUser($id, $first_name, $last_name, $email, $cnic, $mobile_number, $dob, $gender, $interests, $about, $telephone_number, $address)
        {
            $UserInterests = serialize($interests);
            $stmt = $this->con->prepare("UPDATE customer_personal SET first_name = ?, last_name = ?, email = ?, cnic = ?, mobile_number = ?, date_of_birth = ?, geneder = ?, interests = ?, about = ?, telephone_number = ?, address = ? WHERE id = ?");
            $stmt->bind_param("ssssssssssss", $first_name, $last_name, $email, $cnic, $mobile_number, $dob, $gender, $UserInterests, $about, $telephone_number, $address, $id);
            if($stmt->execute()){
                return 1;
            }else{
                return 2;
            }
        }
}
?>