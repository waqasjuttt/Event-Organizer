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
        <style>
            body
            {
                background-image: url('BG12.jpg');
                background-repeat: no-repeat;
            }
            span
            {
                color: red;
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
        </style>
    </head>
    
    <body>
        <?php
        include_once 'model/signup.php';
        include 'functions/sign_up.php';
       
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
        ?>
        <div class="container">
            <div class="row centered-form">
                <div class="col-xs-12 col-sm-8 col-md-10 col-sm-offset-2 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Welcome to Login Form</h3>
                        </div>
                        <div class="panel-body">
                            <form action="controller/login-process.php" method="post" role="form">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label>cnic</label>
                                            <input type="text" name="cnic" value="<?php echo ($obj->get_cnic()); ?>"
                                                   placeholder="Enter your cnic"
                                                   class="form-control input-sm" id="user-name" required="required"
                                                   style="width:40%;">
                                                   <span>*</span>
                                                   <span style="margin-left:3%; font-size: 14px;">
                                                    <?php
                                        if(isset($errors['cnic'])){
                                        echo($errors['cnic']);
                                        }?>
                                                   </span>
                                        </div>
                                    </div>
                                </div>
                                        <div class=" form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" value="" placeholder="Enter Password"
                                                   class="form-control input-sm" id="password" style="/*width:70%;*/">
                                            <span >*</span>
                                             <span style="margin-left:3%; font-size: 14px;">
                                                    <?php
                                        if(isset($errors['pass'])){
                                        echo($errors['pass']);
                                        }?>
                                                   </span>
                                        </div>
                                 
                                <div class="form-group">
                                    <label for="Select-Domain">Select Domain</label>
                                    <select name="domain" required class="form-control" title="Please Select Domain">
                                            <option value=""></option>
                                            <option value="customer">CUSTOMER</option>
                                            <option value="contractor">CONTRACTOR</option>
                                            </select>

                                        <span>*</span>
                                </div>
                                <div class="row">
                                <div class="form-group"><div class="col-lg-6">
                                        <input type="checkbox" name="re" value="on"
                                               class="form-control" id="cb"/><span style="font-size:16px;
                                    font-weight:bold;
                                margin-left:10px; color:black;
                                ">Remember me</span><br />  

                                    </div></div></div>
                                <div class="row" ><div class="col-lg-6">
                                    
                                    
                                        <input type="submit" value="Login" name="login" class="btn btn-info btn-block"
                                       style="padding:5px;width:30%; margin-left: 30%; margin-top:10px;" >
                                <span id="for"> <a href="forget-password.php">Forget Password</a></span></div>
                                </div>
                                <span style="margin-left:3%; font-size: 14px;">
                                                    <?php
                                        if(isset($errors['query'])){
                                        echo($errors['query']);
                                        }?>
                                                   </span>
                            </form>
                            <div class="row">
                                <span id="sign"><a href="sign-up.php" >Sign Up / Register</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        
//session_start();
session_destroy();
?>
        <!------------------------------------>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" lang="javascript"></script>
    </body>
</html>
