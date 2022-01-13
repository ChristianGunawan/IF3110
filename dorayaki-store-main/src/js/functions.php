<?php

function countDorayaki()
{
    $db = new PDO('sqlite:../database.sqlite');
    $count = 0;
    $result = $db->query("SELECT * FROM dorayaki");
    foreach ($result as $row) {
        $count = $count + 1;
    }
    return $count;
}


?>