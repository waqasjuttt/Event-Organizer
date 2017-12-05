<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <link href="forms-style.css" rel="stylesheet" type="text/css">
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <style>
              body
            {
                background-image: url('BG12.jpg');
                background-repeat: no-repeat;
            }
            #for
            {
               margin-left: 62%;
               margin-top: -30px;
               float: left;
            }
            #for a{
                text-decoration: none;
                color: red;
            }
            #for a:hover{
                text-decoration: none;
                color: green;
                font-weight: bold;
            }
            #sign
            {
                margin-left: 23%; 
               padding: 5px;
            }
             #sign a
             {
                 text-decoration: none;
                color: green;
             }
             #sign a:hover
             {
                   text-decoration: none;
                color: red;
                font-weight: bold;
             }
             #cb
{
    width: auto;
    height: auto;
	margin-left:20px;
	border:1px solid black;
	zoom:2.0;
        float: left;
        margin-top: 0px;
}
input[type=submit] {
    width: 20%;
    padding: 10px;
    margin-left:20%;
	margin-top:20px;
   border-radius: 5px;
  cursor: pointer;
   font-size:18px;
   color:#069;
   background-color:#CCC;
   border:1px solid black;
   margin-bottom:3px;
}

        </style>

    </head>
    
    <body>
         <?php
           
        include 'model/signup.php';
       include 'functions/sign_up.php';
     
      session_start();
            if(isset($_SESSION['errors2'])){
                            $errors2 =$_SESSION['errors2'];
                        }
           if(isset($_SESSION['obj'])){
                            $obj = $_SESSION['obj'];
                        }
                        else{
                            $obj = new signup();
                        }
            
            ?>
        <div class="container">
            <div class="row centered-form">
                <div class="col-xs-12 col-sm-8 col-md-10 col-sm-offset-2 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Welcome to Login Form</h3>
                            <h3 class="panel-title">Now Enter Account Information</h3>
                        </div>
                        <div class="panel-body">
                            <form action="controller/account-process.php" method="post" role="form">
                                        <div class=" form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" value="" placeholder="Enter Password"
                                                   class="form-control input-sm" id="password" style="/*width:70%;*/">
                                            <span >*</span>
                                        </div>
                                <span style="margin-left:3%; font-size: 16px;">
                                        <?php
                                        if(isset($errors2['password'])){
                                        echo($errors2['password']);
                                        }?>
                                            </span>
                                 <div class=" form-group">
                                            <label>confirm Password</label>
                                            <input type="password" name="cpassword" value="" placeholder="Enter confirm Password"
                                                   class="form-control input-sm" id="password" style="/*width:70%;*/">
                                            <span >*</span>
                                        </div>
                                
                                <div class="form-group">
                                   <div class="row">
                                <div class="cell cell-left"><img src="model/CaptchaSecurityImages.php?width=100&height=40&characters=5" /></div>
                                <div class="cell cell-right">
                                    <input type="text" id="captcha" name="captcha"   placeholder="Captcha">
                                    <span id="captcha_error">
                                         <?php
                                            if(isset($errors2['captcha'])){
                                                echo($errors2['captcha']);
                                            }
                                        ?>
                                    </span>
                                </div>
      <br>
                                <div class="row" ><div class="col-lg-6">
                                    
                                    
                                        <input type="submit" value="Register" name="safe" class="btn btn-info btn-block"
                                       style="padding:5px;width:30%; margin-left: 30%; margin-top:10px;" >
                                
                        </div>
                    </div>
                            </form>
                </div>
            </div>
        </div>
         
    
        <!------------------------------------>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>
        <script src="js/bootstrap.min.js" lang="javascript"></script>
    </body>
</html>
