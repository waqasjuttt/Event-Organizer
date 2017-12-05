<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Forget Password</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <link href="forms-style.css" rel="stylesheet" type="text/css">
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
#bt
{
    padding:5px;
    width:40%; 
    margin-left: 30%;
    margin-top:10px;
}
@media (max-width:500px)
{
    #bt
    {
        margin-left: 0px;
            width:100%;   
    }
}
        </style>
    </head>
    
    <body>
        <?php
            include 'model/signup.php';
         session_start();
            if(isset($_SESSION['errors'])){
                            $errors =$_SESSION['errors'];
                        }
           if(isset($_SESSION['obj'])){
                            $obj = $_SESSION['obj'];
                        }
                        else{
                            $obj = new signup();
                        }
                        if(isset($_SESSION['back_msg'] )){
                            $b = $_SESSION['back_msg'] ;
                            if($b == "yes")
                            {
                                $_SESSION['back_msg'] = "no";
                                header("Location: message.php");
                            }
                        }
                        
        
        ?>
        <div class="container">
            <div class="row centered-form">
                <div class="col-xs-12 col-sm-8 col-md-10 col-sm-offset-2 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Welcome to forget Password Form</h3>
                        </div>
                        <div class="panel-body">
                            <form action="controller/forget_password_process.php" method="post" role="form">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                      
                                        <div class="form-group" >
                                            <label>Email</label>
                                            <input type="email" name="email" value="<?php echo ($obj->get_email());?>"
                                                   placeholder="Enter your email"
                                                   class="form-control input-sm" id="email" >
                                                   <span>*</span>
                                                   <span style="margin-left:3%; font-size: 16px;">
                                        <?php
                                        if(isset($errors['email'])){
                                        echo($errors['email']);
                                        }?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                        <div class=" form-group">
                                            <label>cnic</label>
                                            <input type="text" name="cnic" value="<?php echo ($obj->get_cnic());?>"
                                                   placeholder="Enter Your CNIC"
                                                   class="form-control input-sm" id="cnic" style="/*width:70%;*/">
                                            <span >*</span>
                                            <span style="margin-left:3%; font-size: 16px;">
                                        <?php
                                        if(isset($errors['cnic'])){
                                        echo($errors['cnic']);
                                        }?>
                                            </span>
                                        </div>
                                 
                                <div class="form-group">
                                    <label for="Select-Domain">Select Domain</label>
                                    <select name="domain"  class="form-control">
                                            <option value=""></option>
                                            <option value="customer">CUSTOMER</option>
                                            <option value="contractor">CONTRACTOR</option>
                                            </select>

                                        <span>*</span>
                                        <span style="margin-left:3%; font-size: 16px;">
                                        <?php
                                        if(isset($errors['domain'])){
                                        echo($errors['domain']);
                                        }?>
                                            </span>
                                </div>
                                
                                <div class="form-group" id="bt">
                                    <input type="submit" value="Reset Password" name="pass" class="btn btn-info btn-block"
                                       style=""  >
                                </div>
                                <span style="margin-left:3%; font-size: 16px;">
                                        <?php
                                        if(isset($errors['result'])){
                                        echo($errors['result']);
                                        }?>
                            </form>
                            
                        
                    </div>
                </div>
            </div>
        </div>
        
        <!------------------------------------>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" lang="javascript"></script>
    </body>
</html>
