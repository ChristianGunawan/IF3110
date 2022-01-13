<?php
    session_start();

    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['qty'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['qty'];

        $dorayaki = array($name, $price, $quantity);

        if (!isset($_SESSION['Cart']))
        {
            $_SESSION['Cart'] = array();
        }

        $_SESSION['Cart'][$name] = $dorayaki;

        header('location: dashboard.php');
    }
?>