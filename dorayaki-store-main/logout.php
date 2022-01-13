<?php
    //Jam akses -1 jam
    setcookie("type", "", time()-3600); 
    header("location:login.php");
?>