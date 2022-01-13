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
    <title>Webede - Ubah Stock Dorayaki</title>
    <link href="../css/tambahVarian.css" rel="stylesheet" type="text/css">

    <!-- stylesheet -->
    <link rel="stylesheet" type="text/css" href="../css/navbar.css?v=<?php echo time(); ?>">
    
    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-center">
            <span class="nav-icon">
                <i class="fas fa-bars"></i>
            </span>
            <a href="dashboard.php">
            <h1>WEBEDE STORE</h1>
            </a>
            <!-- Live Search -->
            <form action="" method="post">
                <input type="text" name="search" placeholder="Search.." id="search" autocomplete="off">
                <input type="submit" name="submit_search" id="submit_search"> 
                <!-- <input type="text" name="keyword" size="40" autofocus placeholder="search..." autocomplete="off" id="keyword">
	            <button type="submit" name="cari" id="tombol-cari">Cari!</button> -->
            </form>
            <!-- End of Live Search -->
            <?php if(!isset($_SESSION["is_admin"])): ?>
                <div class="cart-btn">
                    <span class="nav-icon">
                        <!-- <i class="fas fa-cart-plus"></i> -->
                        <!-- <a href="shopping.php" class="shop"><i class="fas fa-shopping-cart"></i></a> -->
                    </span>
                    <!-- <div class="cart-items">0</div> -->
                </div>
            <?php else: ?>
                <div>
                    <!-- tombol menambah varian jenis dorayaki --> 
                    <button><a href="tambahVarian.php">Tambah Varian</a></button>
                </div>
            <?php endif ?>
        </div>
        <button class="logout-btn">
            <a href="logout.php">Logout</a>
        </button>
    </nav>
    <!-- end of Navbar -->
    <div class="box">
        <h1>Ganti stock dorayaki</h1>
        <form action="" method="post">
            <input type="hidden" class="nama_dorayaki" name="nama_dorayaki" id="nama_dorayaki" value="<?= $nama_dorayaki ?>"> 
            <input type="hidden"class="gambar" name="gambar" id="gambar" value="<?= $gambar ?>"> 
            <input type="hidden" class="harga" name="harga" id="harga" value="<?= $harga ?>"> 
            <input type="hidden" class="jumlah_terjual" name="jumlah_terjual" id="jumlah_terjual" value="<?= $jumlah_terjual ?>">
            <input type="hidden" class="deskripsi" name="deskripsi" id="deskripsi" value="<?= $deskripsi ?>">
            Edit Stock: <input type="text" class="stock" name="stock" id="stock" value="<?= $stock ?>"> <br>
            <input type="submit" class="submit" name="ubah_dorayaki" id="ubah_dorayaki"> <br>
        </form>
        <button class="back"><a href="./dashboard.php"> Back </a></button>
    </div>
    
</body>
</html>

<?php
    require "../database.php";

    $db = new PDO('sqlite:../database.sqlite');

    if (isset($_POST['ubah_dorayaki'])){
        if ($_POST["stock"] == ""){
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
