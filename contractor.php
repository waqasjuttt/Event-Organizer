<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
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
        <?php
       session_start();
        if (isset ($_COOKIE['id']))
        {
        echo $_COOKIE['id'].'Cookie<br>';
       // echo $_COOKIE['lastname'].'<br>';
        echo $_COOKIE['cnic'].'<br>';
        /*echo $_COOKIE['ip'].'<br>';
        echo $_COOKIE['date_of_birth'].'<br>';
        echo $_COOKIE['time'].'<br>';*/
        }elseif (count($_SESSION) > 0) {
            
        
        echo $_SESSION['firstname'].'<br>';
        echo $_SESSION['lastname'].'<br>';
        echo $_SESSION['cnic'].'<br>';
        echo $_SESSION['ip'].'<br>';
        echo $_SESSION['date_of_birth'].'<br>';
        echo $_SESSION['time'].'<br>';
        } else {
            echo 'Error';?>
        
        <?php
        }
        ?>
        <a href="logout.php">Logout</a>
    </body>
</html>
