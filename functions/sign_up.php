<?php

abstract class Web_Interface{
    public static function load_genders($geneder)
    {
            $genders = array("male","female","others");
            $output = "";
           // $j= "";
            foreach($genders as $i)
            {
               // $output .="$i";
                  $output .= "<input type='radio' name='geneder' id='$i' value='$i'";
                  if($geneder === $i){
                    $output .= "checked ";
                    
                  }
                  
                  $output .= "/> $i";
                  //$output .= "";
                  
            }
            echo($output);
    }
     public static function load_city($option) {
        $output = "<select id='city' name='city'>";
        $output .= "<option value='0'>city</option>";
        $city_options = array("lahore","islamabad","multan");
        foreach ($city_options as $i) {
            $output .= "<option value='$i'";
            if($i === $option){
                $output .= " selected";
            }
            $output .= ">$i</option>";
        }
        $output .= "</select>";

        echo($output);
    }
     public static function load_days($day) {
        $output = "<select id='day' name='day'>";
        $output .= "<option value='0'>Day</option>";
        //$day = 0;
        for ($i = 1; $i <= 31; $i++) {
            $output .= "<option value='$i'";
            if($i == $day){
                $output .= " selected";
            }
            $output .= ">$i</option>";
        }
        $output .= "</select>";

        echo($output);
    }

    public static function load_months($month) {
        $output = "<select id='month' name='month'>";
        $output .= "<option value='0'>Month</option>";
        //$month = 0;
        for ($i = 1; $i <= 12; $i++) {
            $output .= "<option value='$i'";
            if($i == $month){
                $output .= " selected";
            }
            $output .= ">$i</option>";
        }
        $output .= "</select>";

        echo($output);
    }

    public static function load_years($year) {
        $output = "<select id='year' name='year'>";
        $output .= "<option value='0'>Year</option>";
//$year = 0;
        for ($i = 2017; $i >= 1980; $i--) {
            $output .= "<option value='$i'";
            if($i == $year){
                $output .= " selected";
            }
            $output .= ">$i</option>";
        }
        $output .= "</select>";

        echo($output);
    }
    public static function load_interests($interests){
        $interests_options = array("Cricket", "Reading", "Collecting");
	$output = "";
	
	foreach($interests_options as $i)
	{
		$output .= "$i<input type='checkbox' name='interests[]' id='$i'  value='$i'";
                if (is_array($interests)) {
                if(in_array($i, $interests)){
                    $output .= "checked";
                }
                }
                $output .= "> - ";
	}
	echo($output);
    }
    //---------------- ---- ---------- Email sending function
    public function send_mail($msg_email , $email , $name)
    {
        
require '../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'fids440@gmail.com';          // SMTP username
$mail->Password = '03124307303'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('fids440gmail.com', 'fahad khalid');
$mail->addReplyTo($email, $name);
$mail->addAddress($email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>Sending Email From LocalHost</h1>';
$bodyContent .= '<p>Finaly Now I can send mail <b>offline</b></p>';

$mail->Subject = 'Email from Localhost By Fahad Khalid';
$mail->Body    = $msg_email;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
	// visit our site www.studyofcs.com for more learning
}


    }
}
?>

