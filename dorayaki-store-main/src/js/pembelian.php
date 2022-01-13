<?php
session_start();

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
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian</title>

    <!-- stylesheet -->
    <link rel="stylesheet" type="text/css" href="../css/dorayaki.css?v=<?php echo time(); ?>">

    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Jquery -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                <span class="nav-icon">
                <!-- <a href="shopping.php" class="shop"><i class="fas fa-shopping-cart"></i></a> -->
                </span>
                <!-- <div class="cart-items">0</div> -->
            </div>
        </div>
        <button class="logout-btn">
            <a href="logout.php">Logout</a>
        </button>
        <div class="right_username">
        <h2><?= $_SESSION['username']; ?></h2>
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
                    <div class="desc-box"></div>
                        <h4>Stok : <?= $stock?></h4>
                        <h3>Harga: Rp<?= $harga ?></h3> <br>
                        <section class="">
                            <?php if(!isset($_SESSION['is_admin'])):  ?>
                                <!-- user -->
                                <form action="beli.php" method="POST">
                                    <input type="number" name="qty" class="qty" id="qty" placeholder="Quantity" min=1 max=<?= $stock ?> value=1 onKeyDown="return false">
                                    <input type="hidden" name="nama_dorayaki" id="nama_dorayaki" value="<?=$nama?>">
                                    <input type="hidden" name="gambar" id="gambar" value="<?=$gambar?>">
                                    <input type="hidden" name="harga" class="harga" id="harga" value="<?=$harga?>">
                                    <input type="hidden" name="stock" class="stock" id="stock" value="<?=$stock?>">
                                    <input type="hidden" name="jumlah_terjual" class="jumlah_terjual" id="jumlah_terjual" value="<?=$jumlah_terjual?>">
                                    <input type="hidden" name="deskripsi" class="deskripsi" id="deskripsi" value="<?=$deskripsi?>">
                                    <input type="submit" name="buy" id="buy" value="Buy">
                                </form>
                            <?php else: ?>
                                <!-- admin -->
                                <form action="" method="POST" onsubmit="return changeStock()">
                                    <input type="number" name="qty" class="stock_change" id="stock_change" min=0 value="<?=$row['stock'];?>" onKeyDown="return false">
                                    <input type="submit" name="ubah_stock" id="ubah_stock" value="Ubah Stock">
                                </form>
                            <?php endif; ?>
                            
                        </section>
                        <?php if(!isset($_SESSION['is_admin'])):  ?>
                            <h3>Total harga:</h3>
                            <h3>Rp<b class="total_harga" id="total_harga"></b></h3>
                        <?php endif; ?>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <!-- <a href="dashboard.php" class="back-btn">Back</a> -->
                    <form action="dorayaki.php" method="POST">
                        <input type="hidden" name="nama_dorayaki" value="<?=$nama;?>">
                        <input type="submit" value="Back">
                    </form>
                </td>
            </tr>
        </table>
    </div>
    <!-- <script type="text/javascript" src="js/pembelian.js?v=2"></script> -->
</body>
<script>
        
    $(document).ready(function () {
        var totalHarga = <?= $harga; ?>*$('#qty').val();
        jQuery(function($) {
            
            $('#total_harga').text(<?= $harga; ?>*$('#qty').val());

            $('#qty').on('input', function() {
                totalHarga = <?= $harga; ?>*$('#qty').val();
                $('#total_harga').text(totalHarga);
            });
        });

    });

</script>
</html>

<?php
    // if (isset($_POST['buy'])) {

    //     $db = new PDO('sqlite:../database.sqlite');

    //     $nama_dorayaki = $_POST["nama_dorayaki"];
    //     $stock = $_POST['stock'];
    //     $jumlah_terjual = $_POST['jumlah_terjual'];
    //     $qty = $_POST["qty"];
        
    //     $stockUpdated = (int)$stock - (int)$qty;
    //     $jumlah_terjualUpdated = (int)$jumlah_terjual + (int)$qty;
        
        // $result2 = $db->prepare('UPDATE dorayaki SET stock = ?, jumlah_terjual = ? WHERE nama_dorayaki LIKE ? ;');
        // $result2->execute(array((int)$stockUpdated, (int)$jumlah_terjualUpdated, $nama_dorayaki));
        // $dorayakiTable = new Dorayaki();
        // $dorayakiTable->updateDorayakiStock($nama_dorayaki, $stockUpdated, $jumlah_terjualUpdated);
        // $db->exec("UPDATE dorayaki SET stock = '$stockUpdated', jumlah_terjual = '$jumlah_terjualUpdated' WHERE nama_dorayaki = '$nama_dorayaki';");
        // header('location:dashboard.php');
        
        // echo "masuk ke isset buying";
        // unset($_SESSION['buying']);
    // }
?>
