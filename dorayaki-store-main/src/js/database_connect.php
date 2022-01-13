<?php
    //Untuk connect ke database
    //$connect = new PDO("mysql:host=localhost;dbname=database", "root", "")
    $connect = new PDO("sqlite:/database.php")



// $dir = 'sqlite:/xampp/htdocs/if-3110-2021-01-21-main/database.sqlite';
// $dbh  = new PDO($dir) or die("cannot open the database");
// $query =  "SELECT * FROM combo_calcs WHERE options='easy'";
// foreach ($dbh->query($query) as $row)
// {
//     echo $row[0];
// }
// $dbh = null;
?>