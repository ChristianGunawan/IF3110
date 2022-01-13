<?php

session_start();
require 'functions.php';
require '../database.php';

if (!isset($_SESSION["login"])) {
    header("location:login.php");
}

if (!isset($_COOKIE["type"])) {
    header("location:login.php");
}

$db = new PDO('sqlite:../database.sqlite');
$dorayakiTableLimit = new Dorayaki();




// Pagination
$jumlahDataPerHalaman = 3;
$jumlahData = countDorayaki();
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

$halamanActive = (isset($_GET['page']) ? $_GET['page'] : 1 );

$awalData = ($jumlahDataPerHalaman*$halamanActive) - $jumlahDataPerHalaman;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webede Store</title>
    <!-- page icon -->
    <!-- <link rel="shortcut icon" href="img/icon_book.png"> -->
    
    <!-- stylesheet -->
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css?v=<?php echo time(); ?>">
    
    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Jquery -->
    <script type="text/javascript" src="js/jquery.js"></script>

    <!-- Script -->
    <!-- <script type="text/javascript" src="js/script.js"></script> -->


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
                <input type="text" name="search" placeholder="Search.." id="search" autocomplete="off" autofocus>
                <input type="submit" name="submit_search" id="submit_search" value="Search"> 
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
        <div class="right_username">
            <?= $_SESSION['username']; ?>
        </div>
    </nav>
    <!-- end of Navbar -->

    <!-- cart overlay ketika icon ditekan -->
    <!-- <div class="cart-overlay">
        <div class="cart">
            <span class="close-cart">
                <i class="fas fa-window-close"></i>
            </span>

            <h2>your cart</h2>

            <div class="cart-content"> -->
                <!-- cart item -->
                    <!-- <div class="cart-item">
                        <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1392706216l/20837627.jpg" alt="Books">
                        <div>
                            <h4>Untuk Apa Seni</h4>
                            <h5>Rp60.000</h5>
                            <span class="remove-item">remove</span>
                        </div>
                        <div>
                            <i class="fas fa-chevron-up"></i>
                            <p class="item-amount">1</p>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div> -->
                <!-- end of cart item -->
            <!-- </div>
            <div class="cart-footer">
                <h3>your total : Rp <span class="cart-total">0</span></h3>
                <button class="clear-cart-btn">Clear Cart</button>
            </div>
        </div>
    </div> -->
    <!-- end of cart -->
    
    <!-- Daftar Menu -->
    
    <h1>Our Product : </h1>

    <!-- product navigation -->
    <div class="pagination">
        <?php if( $halamanActive > 1 ) : ?>
            <a href="?page=<?= $halamanActive - 1 ?>">&laquo;</a>
        <?php endif; ?>

        <?php for ($i=1; $i <= $jumlahHalaman; $i++) :  ?>
            <?php if ($i == $halamanActive) : ?>
                <a href="?page=<?= $i;  ?>" class="active"><?= $i;  ?></a>
            <?php else : ?>
                <a href="?page=<?= $i;  ?>"><?= $i;  ?></a>
            <?php endif; ?>

        <?php endfor;    ?>

        <?php if( $halamanActive < $jumlahHalaman ) : ?>
            <a href="?page=<?= $halamanActive + 1 ?>">&raquo;</a>
        <?php endif; ?>
    </div>
    <!-- End of product navigation -->

    <div class="product-container" id="container">
        <?php 

            if(isset($_POST["search"])){
                $searchKey = $_POST["search"];
                $result = $db->query('SELECT * FROM dorayaki WHERE nama_dorayaki = "%$searchKey%";');
            }else {
                $result = $db->prepare('SELECT * FROM dorayaki ORDER BY jumlah_terjual DESC LIMIT ?, ?;');
                $result->execute(array($awalData, $jumlahDataPerHalaman));
            }
            while($row = $result->fetch(\PDO::FETCH_ASSOC)):
            
        ?>
        <!-- item card -->
        <article class="itemCard">
                <section class="gambar">
                    <?php $imgSource = $row['gambar']; ?>
                    <img src="<?= $imgSource ?>" class="gambar" alt="Dorayaki image">
                </section>
                <section class="nama_dorayaki">
                    <a> Nama :
                        <form action="dorayaki.php" method="POST">
                            <input type="hidden" name="nama_dorayaki" value="<?=$row['nama_dorayaki'];?>">
                            <input type="submit" value="<?= $row['nama_dorayaki']; ?>">
                        </form>
                    </a>
                </section>
                <section class="harga">
                    <a> Harga :
                    <?= $row['harga']; ?>
                    </a>
                </section>
                <section class="jumlah_terjual">
                    <a> Jumlah Terjual :
                    <?= $row['jumlah_terjual']; ?>
                    </a>
                </section>
                <section class="cartb">
                    <form action="addToCart.php" method="POST">
                        <input type="hidden" name="name" value="<?=$row['nama_dorayaki'];?>">
                        <input type="hidden" name="price" value="<?=$row['harga'];?>">
                    </form>
                </section>
        </article>
        <!-- end of item card -->
    </div>
    <?php endwhile;?>
    <!-- end of Daftar Menu -->
    
    
    <script type="text/javascript" src="js/script.js?v=2"></script>
</body>
</html>

<!-- Untuk search -->
<?php
    if (isset($_POST["search"])){
        $db = new PDO('sqlite:../database.sqlite');

        $str = $_POST["search"];
        $hasil_search_count = $db->query("SELECT COUNT(*) FROM dorayaki WHERE nama_dorayaki LIKE '%$str%'");
        $hasil_search = $db->query("SELECT * FROM dorayaki WHERE nama_dorayaki LIKE '%$str%'");

        if ($hasil_search_count == 0){
            $output = 'Tidak ditemukan dorayaki dengan nama tersebut';
            }
            else
            {
                while($row = $hasil_search->fetch(\PDO::FETCH_ASSOC)) {
                    echo "<article class='itemCard'>";
                        echo "<section class='gambar'>";
                            $imgSource = $row['gambar'];
                            echo "<img src=' $imgSource' class='gambar' alt='Dorayaki image'>";
                        echo "</section>";
                        echo "<section class='nama_dorayaki'>";
                            echo "<a> Nama :";
                                echo "<form action='dorayaki.php' method='POST'>";
                                    $dorayaki_name = $row['nama_dorayaki'];
                                    echo "<input type='hidden' name='nama_dorayaki' value='$dorayaki_name'>";
                                    echo "<input type='submit' value=' $dorayaki_name '>";
                                echo "</form>";
                            echo "</a>";
                            echo "</section>";
                            echo "<section class='harga'>";
                            $price = $row['harga'];
                            echo "<a> Harga :";
                            echo "<?= $price ?>";
                            echo "</a>";
                        echo "</section>";
                        echo "<section class='jumlah_terjual'>";
                            $sold = $row['jumlah_terjual'];
                            echo "<a> Jumlah Terjual :";
                            echo "<?= $sold ?>";
                            echo "</a>";
                        echo "</section>";
                        if(!isset($_SESSION['is_admin'])){
                            echo "<section class='cartb'>";
                                echo "<form action='addToCart.php' method='POST'>";
                                    echo "<input type='number' name='qty' class='qty' placeholder='Quantity' min=0>";
                                    echo "<input type='hidden' name='name' value='<?=$dorayaki_name?>'>";
                                    echo "<input type='hidden' name='price' value='<?=$price?>'>";
                                    echo "<input type='submit' value='Add to Cart' name='addCart'>";
                                echo "</form>";
                            echo "</section>";
                        }
                        
                    echo "</article>";
                }
            }
     } 
?>