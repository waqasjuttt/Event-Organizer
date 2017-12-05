

                    <?php
                    
                    session_start();
                    
                    if(isset($_SESSION['msg'])){
                        $msg = $_SESSION['msg'];
                        //unset($_SESSION['msg']);
                        echo("$msg");
                        
                        
                    }
                   /* if(isset($_SESSION['msg_email'])){
                        $msg_email = $_SESSION['msg_email'];
                        unset($_SESSION['msg_email']);
                        echo("$msg_email");
                        
                    }*/
                    
                    $_SESSION['back_msg'] = "yes";
                    //header("Pragma: no-cache");
                   // header("Cache-Control: no-store, no-cache, must-revalidate");
                    ?>
                   
                 