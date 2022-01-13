<?php


if (isset($_GET["nama_dorayaki"])){
    $nama_dorayaki = $_GET["nama_dorayaki"];
    $db = new PDO('sqlite:../database.sqlite');
    $result = $db->exec("DELETE FROM dorayaki WHERE nama_dorayaki = '$nama_dorayaki';");
    echo "<script>
        alert('Dorayaki berhasil dihapus !');
        document.location.href = 'dashboard.php';
        </script>
    ";
} else {
    echo "<script>
        alert('Dorayaki gagal dihapus !');
        document.location.href = 'dashboard.php';
        </script>
    ";
}


?>

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

                <span class="nav-icon">
                    <a href="shopping.php" class="shop"><i class="fas fa-shopping-cart"></i></a>
                    <!-- <i class="fas fa-cart-plus"></i> -->
                </span>
                <!-- <div class="cart-items">0</div> -->
                
            </div>
        </div>
        <button class="logout-btn">
            <a href="logout.php">Logout</a>
        </button>
    </nav>
    <!-- end of Navbar -->