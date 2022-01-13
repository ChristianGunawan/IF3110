<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link href="../css/shopping.css" rel="stylesheet" type="text/css">
</head>
<body>
    <h1>Shopping Cart</h1>
    <table class="table">
        <thead>
            <tr>
                <th> No </th>
                <th> Nama Dorayaki </th>
                <th> Harga Satuan (Rp)</th>
                <th> Kuantitas </th>
                <th> Harga Total (Rp) </th>
                <th> Hapus </th> 
            </tr>
        </thead>
        <tbody>
            <?php
                $total = 0;
                $totalprice = 0;
                $nomor = 1;
                foreach($_SESSION['Cart'] as $dorayaki){
                    $price = 0;
                    $quantity = 0;

                    echo "<form action='deletecart.php' method='POST'>";
                    echo "<tr style='background:lightgray'>";
                        echo "<td>".$nomor."</td>";
                        $nomor = $nomor + 1;
                        foreach($dorayaki as $key => $value){
                            if ($key == 0){
                                echo "<td>".$value."</td>";
                                echo "<input type='hidden' name='p$key' value='".$value."'>";
                            } else if ($key == 1){
                                echo "<td style='text-align : center'>".$value."</td>";
                                echo "<input type='hidden' name='p$key' value='".$value."'>";
                                $price = $value;
                            } else if ($key == 2){
                                echo "<td style='text-align : center'>".$value."</td>";
                                echo "<input type='hidden' name='p$key' value='".$value."'>";
                                $quantity = $value;
                            }
                        }
                        $total = ((int)$quantity * (int)$price);
                        $totalprice = $total + $totalprice;
                        echo "<td style='text-align : center'>".($total)."</td>";
                        echo "<td> <input type='submit' name='Delete' value='Delete'> </td>";  
                    echo "</tr>";
                    echo "</form>";
                }
            ?>

            <tr style="background:lightgray">
                <th colspan="4"> Total Keseluruhan : </th>
                <?php
                    echo "<th>".$totalprice."</th>";
                ?>
                <th> &nbsp; </th>
            </tr>
        </tbody>
            
            
    </table>
    <button class="back"><a href="./dashboard.php"> Back </a></button>
</body>
</html>