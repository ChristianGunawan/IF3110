<?php 
session_start();
require "../database.php";

if (!isset($_SESSION["login"])) {
    header("location:login.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $nama ?></title>

    <!-- page icon -->
    <!-- <link rel="shortcut icon" href="img/icon_book.png"> -->
    
    <!-- stylesheet -->
    <link rel="stylesheet" type="text/css" href="../css/dorayaki.css?v=<?php echo time(); ?>">

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

            <div class="cart-btn">

          
                
            </div>
        </div>
        <button class="logout-btn">
            <a href="logout.php">Logout</a>
        </button>
        <div class="right_username">
            <?= $_SESSION['username']; ?>
        </div>
    </nav>
    <!-- end of Navbar -->

    <div class="box">
        <table>
            <tr>
                <td rowspan="2">
                    <!-- img box -->
                    <div class="slide-img">
                        <img src="<?= $gambar ?>" alt="Dorayaki Image" width="300" height="400">
                    </div>
                </td>
                <td>
                    <div class="header">
                        <h2>Dorayaki <?= $nama  ?></h2>
                    </div>
                    <div class="desc-box">
                        <h4><?= $deskripsi  ?></h4>
                        <h4>Stok : <?= $stock ?></h4>
                        <h4>Jumlah Terjual: <?= $jumlah_terjual ?></h4>
                        <h3>Rp<?= $harga ?></h3> <br>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td class="back-btn">
                    <a href="dashboard.php" class="back-btn">Back</a>
                </td>
                <?php if(!isset($_SESSION["is_admin"])): ?>
                    <td class="back-btn">
                        <!-- <a href="pembelian.php?nama_dorayaki=<?= $nama_dorayaki; ?>" class="back-btn" onclick="return 
                        ('Beli Dorayaki ?');">Buy</a> -->
                        <form action="pembelian.php" method="POST">
                            <input type="hidden" name="nama_dorayaki" value="<?=$nama;?>">
                            <input type="submit" value="Buy">
                        </form>
                        
                    </td>
                <?php else: ?>
                    <td class="back-btn">
                        <form action="ubahStock.php" method="POST">
                            <input type="hidden" name="nama_dorayaki" value="<?=$nama;?>">
                            <input type="submit" value="Ubah Stock">
                        </form>
                    </td>

                    <td class="back-btn">
                        <form action="editDorayaki.php" method="POST">
                            <input type="hidden" name="nama_dorayaki" value="<?=$nama;?>">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                    
                    <td class="back-btn">
                        <a href="deleteDorayaki.php?nama_dorayaki=<?= $nama_dorayaki; ?>" class="back-btn" onclick="return 
                        ('Hapus Dorayaki ?');">Delete</a>
                    </td>
                <?php endif ?>
            </tr>
        </table>
    </div>
</body>
</html>
