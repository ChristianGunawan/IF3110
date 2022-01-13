<?php
    session_start();

    if(isset($_POST['Delete'])){
        $name = $_POST['p0'];
        $price = $_POST['p1'];
        $quantity = $_POST['p2'];

        $dorayaki= array($name,$price,$quantity);

        unset($_SESSION['Cart'][$name]);
        header('location:shopping.php');
    }
?>