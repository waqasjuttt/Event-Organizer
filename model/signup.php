<?php


class signup {
    //----- Data Members -------------//
    public $user_id;
    public $company_id;
    private $first_name;
    private $last_name;
    private $email;
    private $cnic;
    private $m_number ;
    private $geneder ;
    private $about ;
    private $telephone;
    private $interests;
    private $address ;
    private $date_of_birth;
    private $profile_image ;
    private $p_i;
    private $company_name ;
    private $reg_number ;
    private $company_telephone ;
    private $city ;
    private $company_address ;
    private $fax_number ;
    private $company_email ;
    private $website ;
    private $c_about ;
    private $company_image ;
    private $password ; 
    private $str;
    private  $category;
    private $ip;




    //----- Data Functions -------------//
      public function __set($name, $value) {
            $method_name = "set_$name";
//                    
            if(!method_exists($this, $method_name)){
                throw new Exception("SET property of $name does not exist");
            }
            $this->$method_name($value);
        }
    public function __get($name) {
            $method_name = "get_$name";

            if(!method_exists($this, $method_name)){
                 throw new Exception("GET property of $name does not exist");
            }

            return $this->$method_name();
        }    
        public function get_id()
        {
            return $this->user_id;
        }

                public function set_first_name($first_name)
    {
         
    $pattern="/^[a-zA-Z ]{1,30}$/";
        if(!preg_match($pattern, $first_name))
        {
            throw new Exception("Enter your first name in just alphabets");
        }
        $this->first_name = $first_name;
    }
    public function check_password($key , $pasword)
    {
        $pass = md5($pasword);
    $host = "localhost";
        $user = "root";
        $password= "";
        $database= "event-management";
        
        $conn =new mysqli();
        
        $conn->connect($host, $user, $password);
        if($conn->connect_errno){
            throw new Exception("DB Connection Error-->$conn->connect_errno");
        }
        $conn->select_db($database);
        if($conn->errno){
            throw new Exception("DB Selection Error-->$conn->connect_errno");
        }
        if ($key == 1)
        {
            $query = "SELECT * FROM `customer_personal` WHERE password = '$pass'";
            $result=$conn->query($query );
        $row= mysqli_fetch_assoc($result);
        
       if ($result==FALSE)
       {
            throw new Exception('Query not run');
       }
       if ($row==NULL)
       {
           throw new Exception('Invalid Password');
       }
        }
        else
        {
            $query = "SELECT * FROM `contractor_personal` WHERE password = '$pass'";
            $result=$conn->query($query );
        $row= mysqli_fetch_assoc($result);
        /*echo '<pre>';
        print_r($row);
        echo '</pre>';*/
       if ($result==FALSE)
       {
            throw new Exception('Query not run');
       }
       if ($row==NULL)
       {
           throw new Exception('Invalid Password');
       }
      
        }
    }

    public function set_last_name($last_name)
    {
         
    $pattern="/^[a-zA-Z ]{1,30}$/";
        if(!preg_match($pattern, $last_name))
        {
            throw new Exception("Enter your last name in just alphabets");
        }
        $this->last_name = $last_name;
    }
    public function set_email($email)
    {
        $pattern="/^[A-Za-z]([A-Za-z0-9]*[-_=.]?)*@([A-Za-z]+[.])*[A-Za-z]{2,3}$/";
        if(!preg_match($pattern, $email))
        {
            throw new Exception("Enter Valid email");
        }
        $this->email = $email;
    }
    
    public function set_cnic($cnic)
    {
        $pattern="/^[3][0-9]{12}$/";
        if(!preg_match($pattern, $cnic))
        {
            throw new Exception("This cnic $cnic is wrong, Enter 13 digits cnic and start with 3");
        }
        $this->cnic = $cnic;
    }
    public function set_m_number($m_number)
    {
       $pattern="/^[0-9]{11}$/";
        if(!preg_match($pattern, $m_number))
        {
            throw new Exception("Enter 11 digits mobile number");
        }
        
        $this->m_number = $m_number;
    }
    public function set_geneder($geneder)
    {
       $geneders = array ("male","female","others");
        if(!in_array($geneder, $geneders))
        {
            throw new Exception("Select Geneder");
        }
        $this->geneder = $geneder;
    }
    public function set_about($about)
    {
        $pattern="/^[A-Za-z0-9!@#$%^&*:;\"'., ><\/\?]{0,400}$/";
        if(!preg_match($pattern, $about))
        {
            throw new Exception("Enter right about self");
        }
        $this->about = $about;
    }
    
    public function set_telephone($telephone)
    {
        $pattern="/^[0-9]{11}$/";
        if($telephone!="")
        {
             if(!preg_match($pattern, $telephone))
        {
            throw new Exception("enter like this 04237526985");
        }
        $this->telephone = $telephone;
        }
    }
    public function set_interests($interests)
    {
        if($interests!=NULL){
     if(is_null($interests)){
                throw new Exception("Missing Interest(s) options");
            }
            if(!is_array($interests)){
                throw new Exception("Interest(s) Should be Array");
            }
            $interests_options = array("Cricket", "Reading", "Collecting");
            foreach ($interests as $i){
                if(!in_array($i, $interests_options)){
                    throw new Exception("Invalid Interest(s) Option"); 
                }
            }
        }
            $this->interests = $interests;
    }
    public function set_date_of_birth($d)
    {
        $from =new DateTime( $d);
        $to   = new DateTime('today');
        $diff=$from->diff($to)->y.'<br>';
    if ($diff<18)
    {
    throw new Exception("Sorry Only 18 or 18+ can apply $d is less then 18");
    }
    $this->date_of_birth = $d;
    }
   
    public function get_interests()
    {
        return $this->interests;
    }

    public function set_address($address)
    {
       // $pattern="/^$/";
        if($address==""){
            throw new Exception("Enter valid address");
        }
    
        $this->address = $address;
        
    }
    public function set_user_id($id)
    {
        $this->user_id = $id;
    }

    public function set_profile_image($profile_image){
          $file=$_FILES["profile_image"]["name"];
          if ($file != "")
          {
$tmp_name = $_FILES["profile_image"]["tmp_name"];
$this->p_i = $tmp_name;
            if($_FILES["profile_image"]["error"]== 4){
                throw new Exception("Missing File");
            }
            $image=getimagesize($_FILES["profile_image"]["tmp_name"]);
            if(!$image){
                throw new Exception("Not a Valid Image");
            }
            if($_FILES["profile_image"]["size"]> 500000){
                throw new Exception("Max size allowed is 5MB");
            }
            $file1= explode(".", $file);
$ext=$file1[1];
$allow = array ("jpg","jpeg","gif","png");
if (!in_array($ext, $allow))
{
    throw new Exception('Wrong Extension');
}
          
$this->profile_image = $file;
////---------------- upload file ------------------------------//////////////////////

$str_path = "../users/$this->cnic/$this->profile_image";
         $this->str = $str_path;
        if(!is_dir("../users")){
            if(!mkdir("../users")){
                throw new Exception("Failed to create users dir");
            }
        }
        if(!is_dir("../users/$this->cnic")){
            if(!mkdir("../users/$this->cnic")){
                throw new Exception("Failed to create users/$this->cnic dir");
            }
        }

        $result = move_uploaded_file($tmp_name , $str_path);

        if(!$result){
            throw new Exception("Failed to upload file");
        }

          }
     }
       public function get_profile_image()
       {
           return $this->profile_image;
       }
       public function upload_profile_image()
     {
   
      
     }
     public function  get_timestamp()
     {
     return $this->p_i;
     }

     public function get_first_name()
{ 
    
    return $this->first_name; 
}
public function get_last_name()
        { 
    
    return $this->last_name; 
}
    public function get_email()
            { 
    
    return $this->email; 
}
    public function get_cnic(){ 
    
    return $this->cnic; 
}
    public function get_m_number()
            { 
    
    return $this->m_number; 
}
public function get_geneder()
            { 
    
    return $this->geneder; 
}
    public function get_about()
            { 
    
    return $this->about; 
}
    public function get_telephone()
            { 
    
    return $this->telephone; 
}
    public function get_address ()
            { 
    
    return $this->address; 
}
  public function get_date_of_birth(){
        if(is_null($this->date_of_birth)){
            return NULL;
        }
            //$date= date("d-m-Y",  $this->date_of_birth);
            return $this->date_of_birth;
        }
        public function get_user_id()
        {
            return $this->user_id;
        }

        /////////----------- company info start ------------------/////////////   
    
    public function set_company_name($company_name)
    {
        $pattern="/^[A-Za-z]+[0-9]{0,}$/";
        if(!preg_match($pattern, $company_name))
        {
            throw new Exception("Enter Valid company name");
        }
        $this->company_name = $company_name;
    }
    public function get_company_name()
    {
        return $this->company_name;
    }
    

    public function set_reg_number($reg_number)
    {
        $pattern="/[A-Za-z0-9]+/";
        if(!preg_match($pattern, $reg_number))
        {
            throw new Exception("Enter valid registration Number");
        }
        $this->reg_number = $reg_number;
    }
    public function get_reg_number()
    {
        return $this->reg_number;
    }
    public function set_company_telephone($company_telephone)
    {
        $pattern="/^[0-9]{11}$/";
        if(!preg_match($pattern, $company_telephone))
        {
            throw new Exception("Enter Valid 11 telephone number with city code");
        }
        $this->company_telephone = $company_telephone;
    }
    public function get_company_telephone()
    {
        return $this->company_telephone;
    }

    public function set_city($option)
    {
       
            $city_options = array("lahore","islamabad","multan");
            
                if(!in_array($option, $city_options)){
                    throw new Exception("Select City"); 
                }
            
            $this->city= $option;
       
    }
    public function get_city()
    {
        return $this->city;
    }

    public function set_company_address($company_address)
    {
        if($company_address==""){
            throw new Exception("Enter valid address");
        }
        $this->company_address = $company_address;
    }
    public function get_company_address()
    {
        return $this->company_address;
    }

    public function set_fax_number($fax_number)
    {
        if ($fax_number!=0)
        {
        $pattern="/^[0-9]{13}$/";
        if(!preg_match($pattern, $fax_number))
        {
            throw new Exception("Enter 13 digits FAX number");
        }
        }
        $this->fax_number = $fax_number;
    }
    public function get_fax_number()
    {
        return $this->fax_number;
    }

    public function set_company_email($company_email)
    {
        $pattern="/^[A-Za-z]([A-Za-z0-9]*[-_=.]?)*@([A-Za-z]+[.])*[A-Za-z]{2,3}$/";
        if(!preg_match($pattern, $company_email))
        {
            throw new Exception("Enter Valid email");
        }
        $this->company_email = $company_email;
    }
    public function get_company_email()
    {
        return $this->company_email;
    }

    public function set_website($website)
    {
        if($website != "")
        {
        $pattern="/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/";
        if(!preg_match($pattern, $website))
        {
            throw new Exception("Enter Valid URL:- https://www.google.com");
        }
        }
        $this->website = $website;
    }
    public function get_website()
    {
        return $this->website;
    }

    public function set_c_about($c_about)
    {
     /*   if($c_about != "")
        {
            throw new Exception("Enter About your company");
        }*/
        $this->c_about = $c_about;
    }
    public function get_ip()
    {
        return $this->ip;
    }

    public function get_c_about()
    {
        return $this->c_about;
    }
    public function set_company_image($company_image)
    {
     $file=$_FILES["company_image"]["name"];
          if ($file != "")
          {
$tmp_name = $_FILES["company_image"]["tmp_name"];
$this->p_i = $tmp_name;
            if($_FILES["company_image"]["error"]== 4){
                throw new Exception("Missing File");
            }
            $image=getimagesize($_FILES["company_image"]["tmp_name"]);
            if(!$image){
                throw new Exception("Not a Valid Image");
            }
            if($_FILES["company_image"]["size"]> 500000){
                throw new Exception("Max size allowed is 5MB");
            }
            $file1= explode(".", $file);
$ext=$file1[1];
$allow = array ("jpg","jpeg","gif","png");
if (!in_array($ext, $allow))
{
    throw new Exception('Wrong Extension');
}
          
$this->company_image = $file;
////---------------- upload file ------------------------------//////////////////////

$str_path = "../users/$this->company_email/$this->company_image";
         $this->str = $str_path;
        if(!is_dir("../users")){
            if(!mkdir("../users")){
                throw new Exception("Failed to create users dir");
            }
        }
        if(!is_dir("../users/$this->company_email")){
            if(!mkdir("../users/$this->company_email")){
                throw new Exception("Failed to create users/$this->company_email dir");
            }
        }

        $result = move_uploaded_file($tmp_name , $str_path);

        if(!$result){
            throw new Exception("Failed to upload file");
        }

          }
     }
        
        
    
   
///---------------------- account ---------------------------------//////////
   
    public function set_password($password,$cpassword)
    {
          if ($password == "")
          { 
              throw new Exception('Your password Field is empty');
          }
              $pattern='/^[a-zA-Z!@#$%^&*]+{4,}[0-9]+{1,}/';
              if(!preg_match($pattern, $password))
              {
                  throw new Exception('Your password must havea combination of small , capital alphabets, numbers and special characters');
              }
                  if ($cpassword == "")
              {
                      throw new Exception('Your Confirm password Field is empty');
              }
                      if (!($password == $cpassword))
                      {
                          throw new Exception('both password doesnot matches');
                      }
                      $p = md5($password);
                      $this->password = $p;  
            
      }
      public function set_domain($domain)
      {
         $allowed = array ("customer","contractor");
         if (!in_array($domain, $allowed))
         {
             throw  new Exception('select domain');
         }
      }

      public function captcha()
      {
           if(!( $_SESSION['security_code'] == $_POST['captcha'] && !empty($_SESSION['security_code'] )) ) {
               throw new Exception('Code does not mtch');
           }
      }
      public function set_category($domain)
      {
          $this->category = $domain;
      }

      public function get_category()
      {
          return $this->category;
      }

            /////// after validation //////////////

/////-------------------------------- INSERT FUNCTIONS START -------------------------//////////////////      
     public function register_customer($act_code){
        $host = "localhost";
        $user = "root";
        $password= "";
        $database= "event-management";
        
        $conn =new mysqli();
        
        $conn->connect($host, $user, $password);
        if($conn->connect_errno){
            throw new Exception("DB Connection Error-->$conn->connect_errno");
        }
        $conn->select_db($database);
        if($conn->errno){
            throw new Exception("DB Selection Error-->$conn->connect_errno");
        }
        
        $ip = $_SERVER['REMOTE_ADDR'];
       $query =" INSERT INTO `customer_personal`( `first_name`, `last_name`, `email`, `cnic`, `mobile_number`, "
               . "`date_of_birth`, `geneder`, `interests`, `about`, `telephone_number`, `address`, `image`, `password`, "
                . "`active`, `reset_code`, `timestamp`, `ip_address`) VALUES "
                . "('$this->first_name','$this->last_name','$this->email','$this->cnic','$this->m_number',"
                . "'$this->date_of_birth','$this->geneder','".serialize($this->interests)."','$this->about',"
               . "'$this->telephone','$this->address','$this->profile_image',"
                . "'$this->password',0,'$act_code',NOW(),'$ip')";
              $result=$conn->query($query );
       if ($result==FALSE)
       {
            throw new Exception('dont upload');
       }
        $this->user_id= $conn->insert_id;
    }
    public function register_contractor($act_code)
    {
       $host = "localhost";
        $user = "root";
        $password= "";
        $database= "event-management";
        
        $conn =new mysqli();
        
        $conn->connect($host, $user, $password);
        if($conn->connect_errno){
            throw new Exception("DB Connection Error-->$conn->connect_errno");
        }
        $conn->select_db($database);
        if($conn->errno){
            throw new Exception("DB Selection Error-->$conn->connect_errno");
        }
        
        /////----- personal data insertion ---------------////////
        $ip = $_SERVER['REMOTE_ADDR'];
       $query ="INSERT INTO `contractor_personal`(`first_name`, `last_name`, `email`, `cnic`, 
           `mobile_number`, `date_of_birth`, `geneder`, `interests`, `about`, `telephone_number`, 
           `address`, `image`, `password`, `active`, `reset_code`, `timestamp`, `ip_address`) VALUES"
               . "('$this->first_name','$this->last_name','$this->email','$this->cnic','$this->m_number','$this->date_of_birth',"
                . "'$this->geneder','".serialize($this->interests)."','$this->about','$this->telephone','$this->address',"
               . "'$this->profile_image','$this->password',0,'$act_code',NOW(),'$ip')";
                
              $result=$conn->query($query );
       if ($result==FALSE)
       {
            throw new Exception('dont upload'.$conn->errno);
       }
        $this->user_id= $conn->insert_id;
        
          /////----- company data insertion ---------------////////
       
       $query ="INSERT INTO `company-info`(`contractor-id`, `name`, `registration`,"
               . " `telephone`, `city`, `address`, `fax`, `email`, `about`, `website`,"
               . " `image`) VALUES ('$this->user_id','$this->company_name','$this->reg_number',"
               . "'$this->company_telephone','$this->city','$this->company_address','$this->fax_number',"
               . "'$this->email','$this->c_about','$this->website','$this->company_image')";
              $result=$conn->query($query );
       if ($result==FALSE)
       {
            throw new Exception('dont upload');
       }
        $this->company_id= $conn->insert_id;
       
       
    }
    
    public function check($email, $cnic, $domain)
    {
         $host = "localhost";
        $user = "root";
        $password= "";
        $database= "event-management";
        
        $conn =new mysqli();
        
        $conn->connect($host, $user, $password);
        if($conn->connect_errno){
            throw new Exception("DB Connection Error-->$conn->connect_errno");
        }
        $conn->select_db($database);
        if($conn->errno){
            throw new Exception("DB Selection Error-->$conn->connect_errno");
        }
        if ($domain == "customer")
        {
            $query = "SELECT * FROM `customer_personal` WHERE `email` = '$email' AND `cnic` = '$cnic' ";
        
        $result=$conn->query($query );
        $row= mysqli_fetch_assoc($result);
       if ($result==FALSE)
       {
            throw new Exception('Query not run');
       }
       if ($row==NULL)
       {
           throw new Exception('Result Not Found Register Yourself');
       }
       
       $this->user_id = $row['id'];
       $this->first_name = $row['first_name'];
       $this->category = $row['domain'];
       //Smysqli_free_result($result);
        }
 else {
       $query = "SELECT * FROM `contractor_personal` WHERE `email` = '$email' AND `cnic` = '$cnic' ";
        
        $result=$conn->query($query );
        $row= mysqli_fetch_assoc($result);
       if ($result==FALSE)
       {
            throw new Exception('Query not run');
       }
       if ($row==NULL)
       {
           throw new Exception('Result Not Found Register Yourself');
       }
       
       $this->user_id = $row['id'];
       $this->first_name = $row['first_name'];
       $this->category = $row['domain'];
       //Smysqli_free_result($result);
 
 }
    mysqli_close($conn); 
        }
        
    
public function reset()
{
       $host = "localhost";
        $user = "root";
        $password= "";
        $database= "event-management";
        
        $conn =new mysqli();
        
        $conn->connect($host, $user, $password);
        if($conn->connect_errno){
            throw new Exception("DB Connection Error-->$conn->connect_errno");
        }
        $conn->select_db($database);
        if($conn->errno){
            throw new Exception("DB Selection Error-->$conn->connect_errno");
        }
        echo $this->category.'<br>';
        echo $this->user_id.'<br>';
        $pattern="/^[customer]/";
         if(preg_match($pattern, $this->category))
         {
             echo 'no gya he';
        
            $query = "UPDATE `customer_personal` SET `password`='$this->password' WHERE `id`='$this->user_id'  ";
        
        $result=$conn->query($query );
        //$row= mysqli_fetch_assoc($result);
       if ($result==FALSE)
       {
            throw new Exception('Query not run');
       }
        }
     else
     {
         $query = "UPDATE `contractor_personal` SET `password`='$this->password' WHERE `id`='$this->user_id'  ";
        
        $result=$conn->query($query );
        //$row= mysqli_fetch_assoc($result);
       if ($result==FALSE)
       {
            throw new Exception('Query not run');
       }
     }
     echo $this->password;
        mysqli_close($conn); 
}
public function login($key,$pasword)
{
    $pass = md5($pasword);
    $host = "localhost";
        $user = "root";
        $password= "";
        $database= "event-management";
        
        $conn =new mysqli();
        
        $conn->connect($host, $user, $password);
        if($conn->connect_errno){
            throw new Exception("DB Connection Error-->$conn->connect_errno");
        }
        $conn->select_db($database);
        if($conn->errno){
            throw new Exception("DB Selection Error-->$conn->connect_errno");
        }
        if ($key == 1)
        {
            $query = "SELECT * FROM `customer_personal` WHERE password = '$pass' AND cnic = '$this->cnic'";
            $result=$conn->query($query );
        $row= mysqli_fetch_assoc($result);
        
       if ($result==FALSE)
       {
            throw new Exception('Query not run');
       }
       if ($row==NULL)
       {
           throw new Exception('Customer Result Not Found Register Yourself');
       }
       $this->user_id = $row['id'].'<br>';
       $this->first_name = $row['first_name'].'<br>';
       $this->last_name= $row['last_name'].'<br>';
       $this->email = $row['email'].'<br>';
       $this->m_number=$row['mobile_number'];
       $this->date_of_birth = $row['date_of_birth'];
       $this->geneder = $row['geneder'];
       $this->interests = unserialize($row['interests']);
       $this->p_i=$row['timestamp'];
       $this->ip=$row['ip_address'];
       return 1;
        }
        else
        {
            $query = "SELECT * FROM `contractor_personal` WHERE password = '$pass' AND cnic = '$this->cnic'";
            $result=$conn->query($query );
        $row= mysqli_fetch_assoc($result);
        /*echo '<pre>';
        print_r($row);
        echo '</pre>';*/
       if ($result==FALSE)
       {
            throw new Exception('Query not run');
       }
       if ($row==NULL)
       {
           throw new Exception('Contractor Result Not Found Register Yourself');
       }
       $this->user_id = $row['id'].'<br>';
       $this->first_name = $row['first_name'].'<br>';
       $this->last_name= $row['last_name'].'<br>';
       $this->email = $row['email'].'<br>';
       $this->m_number=$row['mobile_number'];
       $this->date_of_birth = $row['date_of_birth'];
       $this->geneder = $row['geneder'];
       $this->interests = unserialize($row['interests']);
       $this->p_i=$row['timestamp'];
       $this->ip=$row['ip_address'];
       return 1;
        }
        return 0;
}
public function see()
        {
        echo $this->first_name.'<br>';
        echo $this->last_name.'<br>';
        echo $this->email.'<br>';
        echo $this->cnic.'<br>';
        $this->ip;
        echo $this->m_number.'<br>';
        print_r( $this->interests);
        echo '<br>';
        echo $this->telephone.'<br>';
        echo $this->geneder.'<br>';
        echo $this->date_of_birth.'<br>';
       // echo NOW().'<br>';
        echo $this->address.'<br>';
        echo $this->profile_image.'<br>';
        echo $this->password.'<br>';
       // echo $act_code.'<br>';
       // $ip = $_SERVER['REMOTE_ADDR'];
       // echo $ip.'<br>';
        echo $this->about.'<br>';
        echo 'Time Stamp = '.$this->p_i; 
        echo $this->company_name.'<br>';
        echo $this->reg_number.'<br>';
        echo $this->company_telephone.'<br>';
        echo $this->city.'<br>';
        echo $this->company_address.'<br>';
        echo $this->fax_number.'<br>';
        echo $this->company_email.'<br>';
        echo $this->c_about.'<br>';
        echo $this->website.'<br>';
        echo $this->company_image.'<br>';
        }
      }
    
    


