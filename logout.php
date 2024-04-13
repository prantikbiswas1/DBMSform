<?php
    session_start();
    if($_SESSION['login']==1){
        $_SESSION['login']=0;
        session_unset();
        header("Location: /DBMSform/login.php");
    }
?>