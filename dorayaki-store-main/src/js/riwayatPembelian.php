<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Pembelian</title>
    <link href="../css/riwayatpembelian.css" rel="stylesheet" type="text/css">
</head>
<body>
    <h1>Riwayat Pembelian</h1>
    <table class="table">
        <thead>
            <tr>
                <th> No (id pembelian)</th>
                <th> Username </th>
                <th> Nama Dorayaki</th>
                <th> Jumlah Beli </th>
                <th> Tanggal </th>
            </tr>
        </thead>
        <tbody>
            <?php
                $db = new PDO('sqlite:../database.sqlite');
                $result = $db->query("SELECT * FROM riwayat_pembelian;");
                
                foreach($result as $row){
                    $id_pembelian = $row['id_pembelian'];
                    $username = $row['username'];
                    $nama_dorayaki = $row['nama_dorayaki'];
                    $jumlah_beli = $row['jumlah_beli'];
                    $tanggal = $row['tglNwaktu'];

                    echo "<tr style='background:lightgray'>";
                        echo "<td>".$id_pembelian."</td>";
                        echo "<td>".$username."</td>";
                        echo "<td>".$nama_dorayaki."</td>";
                        echo "<td>".$jumlah_beli."</td>";
                        echo "<td>".$tanggal."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
            
    </table>
    <button class="back"><a href="./dashboard.php"> Back </a></button>
</body>
</html>
