<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>sign up</title>
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
        </style>
    </head>
    
    <body>
        <div class="container">
            <div class="row centered-form">
                <div class="col-xs-12 col-sm-8 col-md-10 col-sm-offset-2 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Welcome to Sign up Form</h3>
                            <h4 class="panel-title">Please Select your Respective Domain</h4>
                        </div>
                        <div class="panel-body">
                            <form action="personal.php" method="post" role="form">
                                 
                                <div class="form-group">
                                    <label for="Select-Domain">Select Domain</label>
                                    <select name="domain" required class="form-control">
                                            <option value=""></option>
                                            <option value="customer">CUSTOMER</option>
                                            <option value="contractor">CONTRACTOR</option>
                                            </select>

                                        <span>*</span>
                                </div>
                                
                                <div class="row" ><div class="col-lg-6">
                                    
                                    
                                <input type="submit" value="Next" class="btn btn-info btn-block"
                                       style="padding:5px;width:30%; margin-left: 30%; margin-top:10px;"
                                       name="safe" >
                                
                                </div>
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
