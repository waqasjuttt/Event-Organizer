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
             @media (max-width:500px)
            {
                .panel-body form select
                {
                  width:90%;
                  
                }
                .panel-body form textarea
                {
                    margin-left: 20px;
                   width: 90%;
                }
                #email
                {
                    width: 90%;
                }
                #op{
                    margin-top: 0px;
                }
                
            }
            #company_name
            {
                width:50%;
            }
            #city
            {
                width: 40%;
            }
        </style>
    </head>
    
    <body>
        <?php
           
        include 'model/signup.php';
        include 'functions/sign_up.php';
     
      session_start();
      if(isset($_SESSION['obj'])){
                            $obj = $_SESSION['obj'];
                        }
                        else{
                            $obj = new signup();
                        }
      
            if(isset($_SESSION['errors1'])){
                            $errors1 =$_SESSION['errors1'];
                        }
           
            
            ?>

        <div class="container">
            <div class="row centered-form">
                <div class="col-xs-12 col-sm-8 col-md-10 col-sm-offset-2 col-md-offset-1">
                    <div class="panel panel-default" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><u>Welcome to SignUp Form</u></h3>
                            <h4 class="panel-title" style="margin-top:5px;">Now Enter Your Company Details</h4>
                        </div>
                        <div class="panel-body" >
                            <form action="controller/companyinfo-process.php" method="post" role="form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input type="text" name="company-name" 
                                                   value="<?php echo($obj->get_company_name()); ?>" 
                                                   placeholder="Enter Company Name"
                                                   class="form-control input-sm" id="company_name" >
                                                   <span>*</span>
                                                   <span style="margin-left:3%; font-size: 16px;">
                                        <?php
                                        if(isset($errors1['company_name'])){
                                        echo($errors1['company_name']);
                                        }?>
                                            </span>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                               
                                        <div class=" form-group">
                                            <label>Company Registration Number</label>
                                            <input type="text" name="reg_number" value="<?php echo ($obj->get_reg_number()); ?>" 
                                                   placeholder="Company Registration Number"
                                                   class="form-control input-sm" id="email" style="width:70%;">
                                            <span >*</span>
                                                <span style="margin-left:3%; font-size: 16px;">
                                        <?php
                                        if(isset($errors1['reg_number'])){
                                        echo($errors1['reg_number']);
                                        }?>
                                            </span>
                                        </div>
                              <div class=" form-group">
                                    <label>Company Phone Number</label>
                                    <input type="text" name="company-telephone" 
                                           value="<?php echo ($obj->get_company_telephone());  ?>" 
                                               class="form-control input-sm"
                                               placeholder="Company Phone Number" style="width:70%;"/>
                                        <span>*</span>
                                        <span style="margin-left:3%; font-size: 16px;">
                                        <?php
                                        if(isset($errors1['company_telephone'])){
                                        echo($errors1['company_telephone']);
                                        }?>
                                        </span>
                              </div>
                                        <div class="form-group">
                                    <label for="Select-city">Select City</label>
                                        <?php
                                        $option = $obj->get_city();
                                        Web_Interface::load_city($option);?>
                                        <span>*</span>
                                        <span style="margin-left:3%; font-size: 16px;">
                                        <?php
                                        if(isset($errors1['city'])){
                                        echo($errors1['city']);
                                        }?></span>
                                </div>
                                <div class="form-group"><div class="row"><div class="col-lg-12">
                                        <div class="text"><label >Address</label></div>
                                     <textarea  name="company_address" placeholder="ENTER Address" value=""><?php echo ($obj->get_company_address()); ?></textarea>
                                        <span>*</span>
                                        
                                    </div>
                                        <span style="margin-left:3%; font-size: 16px;">
                                        <?php
                                        if(isset($errors1['company_address'])){
                                        echo($errors1['company_address']);
                                        }?>
                                        </span>
                                    </div>
                                </div>
                                <div class=" form-group"><div class="row"><div class="col-lg-12">
                                    <label>Company FAX Number</label>
                                        <input type="text" name="fax_number" 
                                               value="<?php echo ($obj->get_fax_number());  ?>" 
                                               class="form-control input-sm"
                                               placeholder="Company FAX Number" style="width:70%;" />
                                        <span id="op" >(Optional)</span>
                                        </div>
                                        <span style="margin-left:3%; font-size: 16px;">
                                        <?php
                                        if(isset($errors1['fax_number'])){
                                        echo($errors1['fax_number']);
                                        }?>
                                        </span>
                                    </div>
                              </div>
                                 <div class=" form-group">
                                     <label >Company Email</label>
                                     <input type="text" name="company_email" value="<?php echo ($obj->get_company_email()); ?>"
                                            class="form-control input-sm"
                                           placeholder="Company Email" id="email"/>
                                        <span>*</span>
                                        <span style="margin-left:3%; font-size: 16px;">
                                        <?php
                                        if(isset($errors1['company_email'])){
                                        echo($errors1['company_email']);
                                        }?>
                                        </span>
                              </div>
                                 <div class=" form-group">
                                     <label >Company website</label>
                                     <input type="text" name="website" value="<?php echo ($obj->get_website());?>" class="form-control input-sm"
                                           placeholder="Company Website" id="email" style="width: 70%;"/>
                                        <span id="op">(Optional)</span>
                                        
                              </div>
                                <div class="form-group"><div class="row"><div class="col-lg-12">
                                        <div class="text"><label >About Company</label></div>
                                        <textarea name="c_about"  placeholder="About Your Company"  ><?php  echo ($obj->get_c_about()); ?></textarea>  
                                     <span id="op">(Optional)</span>
                                    </div>
                                        <span style="margin-left:3%; font-size: 16px;">
                                        <?php
                                        if(isset($errors1['c_about'])){
                                        echo($errors1['c_about']);
                                        }?>
                                        </span>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-lg-4">
                                        <label>Upload Your Image : </label>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group"  >
                                    <input type="file" name="company_image" class="form-control " id="ui">
                                    
                                    </div>
                                        
                                         </div>
                                    
                                    </div>
                                <span style="margin-left:5%;  float: left; font-size: 16px;">
                                        <?php
                                        if(isset($errors1['company_image'])){
                                        echo($errors1['company_image']);
                                        }?>
                                            </span>
                                <input type="submit" value="Next" name="save" class="btn btn-info btn-block"
                                       style="padding:5px;width:60%;margin-top:10px;align-content: center;margin: auto;" >
                                
                                </form>

                        </div>
                                          
                        </div>
                    </div>
                </div>
            </div>
       
        
        <!------------------------------------>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" lang="javascript"></script>
    </body>
</html>
