<?php
session_start();

require "../database.php";

$db = new PDO('sqlite:../database.sqlite');

if(isset($_POST["buy"])) {
    $nama_dorayaki2 = $_POST["nama_dorayaki"];
    $gambar2 = $_POST["gambar"];
    $harga2 = $_POST["harga"];
    $stock2 = $_POST["stock"];
    $jumlah_terjual2 = $_POST["jumlah_terjual"];
    $qty2 = $_POST["qty"];
    $deskripsi2 = $_POST["deskripsi"];

    $stockint = (int)$stock2;
    $qtyint = (int)$qty2;
    $jtint = (int)$jumlah_terjual2;
    $stockUpdated = $stockint - $qtyint;
    $jumlah_terjualUpdated = $jtint + $qtyint;

    $db->exec("UPDATE dorayaki SET gambar='$gambar2', harga='$harga2', stock='$stockUpdated', jumlah_terjual='$jumlah_terjualUpdated', deskripsi='$deskripsi2' WHERE nama_dorayaki='$nama_dorayaki2';"); 
    // $db->exec("UPDATE dorayaki SET stock='3' WHERE nama_dorayaki='$nama_dorayaki2';");

    // $d = DateTime::createFromFormat('d-m-Y H:i:s', '22-09-2008 00:00:00');
    // if ($d === false) {
    //     die("Incorrect date string");
    // } else {
    //     echo $d->getTimestamp();
    // }
    // $tglNwaktu = 
    // $username = $_SESSION['username'];

    // $queryUpdate = "UPDATE dorayaki SET gambar='$gambar2', harga='$harga2', stock='$stockUpdated', jumlah_terjual='$jumlah_terjualUpdated', deskripsi='$deskripsi2' WHERE nama_dorayaki='$nama_dorayaki2';";
    // $queryInsert = "INSERT INTO riwayat_pembelian(username, nama_dorayaki, jumlah_beli, tglNwaktu)
    // VALUES($username, $nama_dorayaki2, $qty2, $tglNwaktu);";


    // echo "
    // <script>

    
    // </script>
    // ";




    echo "<script>
            alert('Dorayaki berhasil dibeli');
            document.location.href = 'dashboard.php';
    </script>
    ";


} else {
    echo "<script>
        alert('Dorayaki gagal dibeli !');
        document.location.href = 'dashboard.php';
        </script>
    ";
}

?>

