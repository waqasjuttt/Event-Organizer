<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Welcome</h1>
    <center>Data You entered</center>
            <?php
        // put your code here
        session_start();
echo $_SESSION['fname'] ."<br>";
echo $_SESSION['$lname'] ."<br>" ;
echo $_SESSION['email'] ."<br>";
echo $_SESSION['cnic'] ."<br>";
echo $_SESSION['m_number'] ."<br>";
echo $_SESSION['geneder'] ."<br>";
echo $_SESSION['about'] ."<br>";
echo $_SESSION['t_number'] ."<br>";
echo $_SESSION['address']."<br>";
echo $_SESSION['image'] ."<br>";
echo $_SESSION['cname'] ."<br>";
echo $_SESSION['reg_number'] ."<br>";
echo $_SESSION['telephone'] ."<br>";
echo $_SESSION['city'] ."<br>";
echo $_SESSION['c_address'] ."<br>";
echo $_SESSION['fax'] ."<br>";
echo $_SESSION['c_email'] ."<br>";
echo $_SESSION['website'] ."<br>";
echo $_SESSION['c_about'] ."<br>";
echo $_SESSION['cfile'] ."<br>";
echo $_SESSION['username']."<br>" ;
echo $_SESSION['password']."<br>"; 
        ?>
    </body>
</html>
