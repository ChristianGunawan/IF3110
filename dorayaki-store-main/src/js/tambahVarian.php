<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location:login.php");
}

if(!isset($_SESSION["is_admin"])) {
    echo "<script>
            alert('You are not Admin !')
          </script>";
    header("location:dashboard.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Webede - Tambah Varian</title>
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
            <!-- End of Live Search --a>
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
        <h1>Masukkan detail dorayaki yang akan ditambahkan</h1>
        <form action="" method="post">
            Nama Dorayaki: <input type="text" class="nama_dorayaki" name="nama_dorayaki" id="nama_dorayaki" required> <br>
            Gambar (dalam url): <input type="text"class="gambar" name="gambar" id="gambar" required> <br>
            Harga: <input type="text" class="harga" name="harga" id="harga" required> <br>
            Stock: <input type="text" class="stock" name="stock" id="stock" required> <br>
            Deskripsi: <input type="text" class="deskripsi" name="deskripsi" id="deskripsi" required> <br>
            <input type="submit" class="submit" name="tambah_varian" id="tambah_varian"> <br>
            <!-- item_terjual pasti nol --> 
        </form>
        <button class="back"><a href="./dashboard.php"> Back </a></button>
    </div>
    
    
    <!-- Untuk Menambah Varian Dorayaki -->
    <?php
        require "../database.php";

        $db = new PDO('sqlite:../database.sqlite');

        if (isset($_POST['tambah_varian'])) { 
            if ($_POST["nama_dorayaki"] == "" || $_POST["gambar"] == "" || $_POST["harga"] == "" || $_POST["stock"] == "" || $_POST["deskripsi"] == ""){
                $message = "<div class='invalid_input'>Data belum semua terisi</div>";
            } else{
                //Function if data dorayaki uda ada
                if (isDorayakiRegistered($_POST)){
                    echo "<script>
                        alert('Varian dorayaki berhasil ditambahkan')
                        document.location.href = 'dashboard.php';
                    </script>";
                }
            }
        }

        function isDorayakiRegistered($data) {
            $db = new PDO('sqlite:../database.sqlite');
            $nama_dorayaki = $data["nama_dorayaki"];
            $gambar = $data["gambar"];
            $harga = $data["harga"];
            $stock = $data["stock"];
            $deskripsi = $data["deskripsi"];

            if(!isNamaDorayakiAvail($nama_dorayaki)) {
                echo "  <script>
                    alert('Varian dorayaki sudah ada !');
                    </script>";
                return false;
            } else {
                $db->exec("INSERT INTO dorayaki(nama_dorayaki, gambar, harga, stock, jumlah_terjual, deskripsi) VALUES('$nama_dorayaki', '$gambar', '$harga', '$stock', 0, '$deskripsi');");
                return true;
            }
        }

        function isNamaDorayakiAvail($nama_dorayaki){
            $db = new PDO('sqlite:../database.sqlite');
            $result = $db->query("SELECT * FROM dorayaki;");
            foreach ($result as $rec) {
                if ($nama_dorayaki == $rec['nama_dorayaki']){
                    return false;
                }
            }
            return true;
        }
    ?>
    
</body>
</html>
