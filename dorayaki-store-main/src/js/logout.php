<?php
    //Jam akses -1 jam
    session_start();
    setcookie("type", "", time()-3600); 

    $_SESSION = [];
    session_unset();
    session_destroy();

    header("location:login.php");
    exit;
?>