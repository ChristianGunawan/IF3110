<?php

session_start();
// require "../database.php";

if (!isset($_SESSION["login"])) {
    header("location:login.php");
}

if(!isset($_SESSION["is_admin"])) {
    echo "<script>
            alert('You are not Admin !')
          </script>";
    header("location:dashboard.php");
}

if (isset($_POST["nama_dorayaki"])) {
    $nama_dorayaki = $_POST['nama_dorayaki'];
    $db = new PDO('sqlite:../database.sqlite');
    $result = $db->query("SELECT * FROM dorayaki;");

    while($row = $result->fetch(\PDO::FETCH_ASSOC)):
        if ($row['nama_dorayaki'] == $nama_dorayaki) {
            $nama = $row['nama_dorayaki'];
            $gambar = $row['gambar'];
            $harga = $row['harga'];
            $stock = $row['stock'];
            $jumlah_terjual = $row['jumlah_terjual'];
            $deskripsi = $row['deskripsi'];
        }
    endwhile;
} else{
    header("location:dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Webede - Edit Dorayaki</title>
    <link href="../css/tambahVarian.css" rel="stylesheet" type="text/css">

    <!-- stylesheet -->
    <link rel="stylesheet" type="text/css" href="../css/navbar.css?v=<?php echo time(); ?>">
    
    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<!-- Navigation Bar -->
<nav class="navbar">
        <div class="navbar-center">
            <span class="nav-icon">
                <i class="fas fa-bars"></i>
            </span>
            <a href="dashboard.php">
            <h1>WEBEDE STORE</h1>
            </a>

            <div class="cart-btn">

                <button><a href="tambahVarian.php">Tambah Varian</a></button>
                <!-- <div class="cart-items">0</div> -->
                
            </div>
        </div>
        <button class="logout-btn">
            <a href="logout.php">Logout</a>
        </button>
    </nav>
    <!-- end of Navbar -->
<body>
    <div class="box">
        <h1>Ganti detail dorayaki yang akan diubah</h1>
        <form action="" method="post">
            Nama Dorayaki: <input type="text" class="nama_dorayaki" name="nama_dorayaki" id="nama_dorayaki" value="<?= $nama_dorayaki ?>"> <br>
            Gambar (dalam url): <input type="text"class="gambar" name="gambar" id="gambar" value="<?= $gambar ?>"> <br>
            Harga: <input type="text" class="harga" name="harga" id="harga" value="<?= $harga ?>"> <br>
            Stock: <input type="text" class="stock" name="stock" id="stock" value="<?= $stock ?>"> <br>
            Jumlah Terjual: <input type="text" class="jumlah_terjual" name="jumlah_terjual" id="jumlah_terjual" value="<?= $jumlah_terjual ?>"> <br>
            Deskripsi: <input type="text" class="deskripsi" name="deskripsi" id="deskripsi" value="<?= $deskripsi ?>"> <br>
            <input type="submit" class="submit" name="edit_dorayaki" id="edit_dorayaki"> <br>
            <!-- item_terjual pasti nol --> 
        </form>
        <button class="back"><a href="./dashboard.php"> Back </a></button>
    </div>
    
    
    <!-- Untuk Menambah Varian Dorayaki -->
    <?php
        require "../database.php";

        $db = new PDO('sqlite:../database.sqlite');

        if (isset($_POST['edit_dorayaki'])){
            if ($_POST["nama_dorayaki"] == "" || $_POST["gambar"] == "" || $_POST["harga"] == "" || $_POST["stock"] == "" || $_POST["jumlah_terjual"] == "" || $_POST["deskripsi"] == ""){
                $message = $message = "<div class='invalid_input'>Data belum semua terisi</div>";
            } else{
                $nama_dorayaki2 = $_POST["nama_dorayaki"];
                $gambar2 = $_POST["gambar"];
                $harga2 = $_POST["harga"];
                $stock2 = $_POST["stock"];
                $jumlah_terjual2 = $_POST["jumlah_terjual"];
                $deskripsi2 = $_POST["deskripsi"];
                $db->exec("UPDATE dorayaki SET gambar='$gambar2', harga='$harga2', stock='$stock2', jumlah_terjual='$jumlah_terjual2', deskripsi='$deskripsi2' WHERE nama_dorayaki='$nama_dorayaki2';");        
                header('location:dashboard.php');
            }
        }
    ?>
    
</body>
</html>
