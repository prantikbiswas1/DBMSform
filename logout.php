<?php
    ob_start();
    session_start();
    if($_SESSION['login']==1){
        $_SESSION['login']=0;
        session_unset();
        header("Location: /login.php");
    }
    ob_end_flush();
?>