<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>forms</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
        <link href="forms-style.css" rel="stylesheet" type="text/css">
        
        <style>
             body
            {
                background-image: url('BG12.jpg');
                background-repeat: repeat;
                height: auto;
            }
             #first-name
           {
               width:70%;
             /*  border:1px solid red;*/
           }
           #last-name
           {
               margin-left: 0px; 
               width:70%;
             /*  border:1px solid red;*/
           }
           @media (max-width:500px)
           {
               #cnic
               {
                   width:75%;
               }
           }
           #day  , #year
           {
               width: 10%;
           }
           #month
           {
               width: 15%;
           }
           @media (max-width:500px)
           {
               #day  , #year
           {
               width: 100%;
           }
           #month
           {
               width: 100%;
           }
           }
        </style>
        
            
    </head>
    
    <body>
        <?php
           
        include 'model/signup.php';
       include 'functions/sign_up.php';
     
      session_start();
      
     // session_destroy();
      
        if (isset($_POST['safe']))
        {
            //session_start();
            $domain=$_POST['domain'];
            $_SESSION['domain']=$domain;
        }
        
            
            
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
                    <div class="panel panel-default" style="height:auto;">
                        <div class="panel-heading">
                            <h3 class="panel-title"><u>Welcome to SignUp Form</u></h3>
                            <h4 class="panel-title" style="margin-top:5px;">First Enter Your Personal Details</h4>
                        </div>
                        <div class="panel-body">
                            <form action="controller/personal-process.php" method="post" 
                                  role="form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="first-name" value=
                                                   "<?php echo( $obj->get_first_name()); ?>"
                                                   placeholder="Enter First Name"
                                                   class="form-control input-sm" id="first-name" >
                                                   <span>*</span>
                                                   <div class="row">
                                            <span style="margin-left:3%; font-size: 16px;">
                                        <?php
                                        if(isset($errors['first_name'])){
                                        echo($errors['first_name']);
                                        }?>
                                            </span>
                                        </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6 col-xs-12col-sm-12">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="last-name" value="<?php echo( $obj->get_last_name()); ?>" placeholder="Enter Last Name"
                                                   class="form-control input-sm" id="last-name" >
                                            <span>*</span>
                                             <div class="row">
                                            <span style="margin-left:5%;  font-size: 16px;">
                                        <?php
                                        if(isset($errors['last_name'])){
                                        echo($errors['last_name']);
                                        }?>
                                            </span>
                                        </div>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                               
                           
                                        <div class=" form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" value=
                                                   "<?php echo( $obj->get_email()); ?>" placeholder="Enter Your Email"
                                                   class="form-control input-sm" id="email" style="width:70%;">
                                            <span >*</span>
                                            <div class="row">
                                            <span style="margin-left:5%;  font-size: 16px;">
                                        <?php
                                        if(isset($errors['email'])){
                                        echo($errors['email']);
                                        }?>
                                            </span>
                                        </div>
                                        </div>
                                 <div class=" form-group">
                                        <label> CNIC </label>
                                         <input type="text" name="cnic" value=
                                                "<?php echo( $obj->get_cnic()); ?>" class="form-control input-sm"
                                                placeholder="Enter Your CNIC"  id="cnic"/>
                                            <span>*</span>
                                            <div class="row">
                                            <span style="margin-left:5%;  font-size: 16px;">
                                        <?php
                                        if(isset($errors['cnic'])){
                                        echo($errors['cnic']);
                                        }?>
                                            </span>
                                        </div>
                                 </div>
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                        <input type="text" name="m-number" value=
                                               "<?php echo ($obj->get_m_number()); ?>" class="form-control input-sm"
                                               placeholder="Enter Your Valid Mobile number" style="width:70%;"
                                          />
                                        <span>*</span>
                                        <div class="row">
                                            <span style="margin-left:5%;  font-size: 16px;">
                                        <?php
                                        if(isset($errors['m_number'])){
                                        echo($errors['m_number']);
                                        }?>
                                            </span>
                                        </div>
                                </div>
                                                 <div class="row">
                                        <div class="form-group">
                                            <label>Date Of Birth</label>
                                            <?php
                                            $d=$obj->get_date_of_birth();
                                            if(isset($d))
                                            {
                                                 $parts = explode("-", $d);
                                            list($day,$month,$year)=$parts;
                                            Web_Interface::load_days($day) ;
                                            Web_Interface::load_months($month) ;
                                            Web_Interface::load_years($year) ;
                                            }
                                            else {
                                                     Web_Interface::load_days($day=0) ;
                                            Web_Interface::load_months($month=0) ;
                                            Web_Interface::load_years($year=0) ;
                                                }
                                                      ?>
                                            <span style="margin-left:5%;  font-size: 16px;">
                                        <?php
                                       if(isset($errors['date_of_birth'])){
                                        echo($errors['date_of_birth']);
                                        } ?>
                                       
                                            </span>
                                        </div>
                                    </div>
                                        
                                <div class="form-group">
                                    <label>Select Gender : 
                                   <?php 
                                  // $r=$obj->set_geneder();
                                   $geneder = $obj->get_geneder();
                                    Web_Interface::load_genders($geneder);
                                  
                                   ?>
                                    </label>
                                    <span >*</span>
                                    <div class="row">
                                            <span style="margin-left:5%;  font-size: 16px;">
                                        <?php
                                        if(isset($errors['geneder'])){
                                        echo($errors['geneder']);
                                        }?>
                                            </span>
                                        </div>
                                </div>
                                         <div class="row">
                                        <label>Interest : </label>
                                    <?php
                                    $in = array();
                                        $in = $obj->get_interests();
                                        Web_Interface::load_interests($in);
                                    ?>
                                    <span id="interests_error">
                                         <?php
                                            if(isset($errors['interests'])){
                                                echo($errors['interests']);
                                            }
                                        ?>
                                    </span>
                                </div>
                                    <div class="form-group" style="margin-top:10px;">
                                    <div class="text"><label >About your Self</label></div>
                                    <div> <textarea  name="about" placeholder="about" value="" ><?php echo $obj->get_about(); ?></textarea>
                                        <span id="op">(Optional)</span></div>
                                        <div class="row">
                                            
                                            <span style="margin-left:5%;  font-size: 16px;">
                                        <?php
                                        if(isset($errors['about'])){
                                        echo($errors['about']);
                                        }?>
                                            </span>
                                        </div>
                                </div>
                                <div class="row">
                               <div class=" form-group ">
                                        <label> Telephone Number </label>
                                        <input type="text" name="telephone" value="<?php echo $obj->get_telephone(); ?>"
                                                placeholder="Enter Your Telephone Number"
                                                style="width:70%;">
                                                
                                         <span id="te" >(Optional)</span>
                                         <div class="row">
                                            <span style="margin-left:5%;  font-size: 16px;">
                                        <?php
                                        if(isset($errors['telephone'])){
                                        echo($errors['telephone']);
                                        }?>
                                            </span>
                                        </div>
                                 </div>
                                </div>
                                <div class="row">
                                    <label class="text">Address</label>
                                <div class="form-group">
                                    <textarea  name="address" placeholder="ENTER Address" value=""><?php echo $obj->get_address(); ?></textarea>
                                
                                    <span style="margin-left:0%;  font-size: 16px;">
                                        <?php
                                        if(isset($errors['address'])){
                                        echo($errors['address']);
                                        }?>
                                            </span>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>Upload Your Image : </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group"  >
                                            <input type="file" name="profile_image" class="form-control " 
                                            id="ui">
                                            
                                    
                                    </div>
                                        <div class="row">
                                            <span style="margin-left:5%;  font-size: 16px;">
                                        <?php
                                        if(isset($errors['profile_image'])){
                                        echo($errors['profile_image']);
                                        }
                                        if(isset($errors2['profile_image'])){
                                        echo($errors2['profile_image']);
                                        }?>
                                            </span>
                                        </div>
                                         </div>
                                    
                                    </div>
                            
                                <input type="submit" value="Next" class="btn btn-info btn-block" name="safe"
                                       style="padding:5px;width:60%;margin-top:10px;align-content: center;margin: auto;" >
                            </form>
                                </div>
                        </div>
                        </div>
                        </div>
                        </div>
        </div>
        
        <!------------------------------------>
        
       
        
    </body>
</html>
