<?php

class User
{  
    var $db;
    // Konstruktor
    function __construct(){
        $this->db = new PDO('sqlite:database.sqlite');
        $this->createTableUser(); 
    }

    // Fungsi Create Table
    public function createTableUser() {
        $this->db->exec("CREATE TABLE IF NOT EXISTS user(
            username TEXT PRIMARY KEY, 
            pass TEXT, 
            email TEXT, 
            is_admin BOOLEAN,
            UNIQUE (email));"
        );
    }

    // Fungsi mengambil semua tuple user
    public function getAllUserRecord()
    {
        // $result = $this->db->exec("SELECT * FROM user;");
        // // return $result;
        // while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        //      print_r($row);
        // }
        $result = $this->db->query('SELECT * FROM user;');
        foreach ($result as $row){
            echo $row['username']."\n";
        }
    }

    // Fungsi mengambil tuple spesifik dari user
    public function getSpecificUserRecord($username)
    {
        $result = $this->db->query("SELECT * FROM user WHERE username = '$username';");
        // foreach ($result as $row){
        //     echo $row['username']."\n";
        // }
        return $result;
    }
    
    // Fungsi Insert
    public function insertUser($username, $pass, $email, $is_admin){ 
        $this->db->exec("INSERT INTO user(username, pass, email, is_admin) 
        VALUES('$username', '$pass', '$email',' $is_admin');");
    }

    // Fungsi Update
    public function updatepassUser($username, $pass){
        $this->db->exec("UPDATE user
        SET pass = $pass
        WHERE username = $username;");
    }

    // Fungsi Delete
    public function deleteUser($username)
    {
        $this->db->exec("DELETE FROM user WHERE username LIKE $username;");
    }

    // HEHE
    // ====
    // $db->exec("INSERT INTO user(username, pass, email, is_admin) 
    // VALUES('Budi', 'sayangortu123', 'budiberbudi@gmail.com', 0)");

    // $db->exec("INSERT INTO user(username, pass, email, is_admin) 
    // VALUES('Andi', 'andiganteng123', 'andi@gmail.com', 0)");

    // $db->exec("INSERT INTO user(username, pass, email, is_admin) 
    // VALUES('Hackaman', 'admin', 'hackaman@gmail.com', 1)");

    // $result = $this->db->query('SELECT * FROM user');
    
    // foreach ($result as $rec) {
    //     print "<h1>".$rec['username']."</h1>";
    // }
}


class Dorayaki
{
    var $db;
    
    //Konstruktor
    function __construct(){
        $this->db = new PDO('sqlite:database.sqlite');
        $this->createTableDorayaki();
    }

    public function createTableDorayaki()
    {
        $this->db->exec("CREATE TABLE IF NOT EXISTS dorayaki(
            nama_dorayaki TEXT,
            gambar TEXT, 
            harga INTEGER,
            stock INTEGER,
            jumlah_terjual INTEGER,
            deskripsi TEXT,
            UNIQUE (nama_dorayaki)
            );"
        );
    }

    public function getAllDorayakiRecord()
    {
        $result = $this->db->query("SELECT * FROM dorayaki;");
        foreach ($result as $row){
            echo $row['nama_dorayaki']."\n";
        }
    }

    public function getSpecificDorayakiRecord($nama_dorayaki)
    {
        $result = $this->db->query("SELECT * FROM dorayaki WHERE nama_dorayaki = $nama_dorayaki;");
        foreach ($result as $row){
            echo $row['nama_dorayaki']."\n";
        }
    }

    public function insertDorayaki($nama_dorayaki, $gambar, $harga, $stock, $jumlah_terjual, $deskripsi)
    {
        $this->db->exec("INSERT INTO dorayaki(nama_dorayaki, gambar, harga, stock, jumlah_terjual, deskripsi)
        VALUES('$nama_dorayaki', '$gambar', '$harga', '$stock', '$jumlah_terjual', '$deskripsi');");
    }
    
    public function updateDorayaki($nama_dorayaki, $gambar, $harga, $stock, $jumlah_terjual, $deskripsi)
    {
        $this->db->exec("UPDATE dorayaki 
        SET gambar=$gambar,
        harga=$harga,
        stock=$stock,
        jumlah_terjual=$jumlah_terjual,
        deskripsi=$deskripsi
        WHERE nama_dorayaki=$nama_dorayaki;");
    }

    public function deleteDorayaki($nama_dorayaki)
    {
        $this->db->exec("DELETE FROM dorayaki WHERE nama_dorayaki LIKE $nama_dorayaki;");
    }

    public function queryLimitDorayaki($start, $jumlah)
    {
        $result = $this->db->query("SELECT * FROM dorayaki LIMIT $start, $jumlah");
        return $result;
    }
    
    // $db->exec("INSERT INTO dorayaki(nama_dorayaki,gambar,harga, stock, jumlah_terjual, deskripsi) 
    // VALUES('coklat', 'blablalba', 5000, 3, 1, 'lalalalallala')");
    // $db->exec("INSERT INTO dorayaki(nama_dorayaki,gambar,harga, stock, jumlah_terjual, deskripsi) VALUES('Strawberry', 'https://japanische-lebensart.de/wp-content/uploads/2020/03/L600_dorayaki-erdbeer-mascarpone_2.jpg', 23000,3,0,'Rasa strawberry yang menyegarkan hati');");

    
    // $result = $db->query('SELECT * FROM dorayaki');
    
    // foreach ($result as $rec) {
    //     print "<h1>".$rec['nama_dorayaki']."</h1>";
    //     print "<h1>".$rec['deskripsi']."</h1>";
    // }
}


class riwayat_pembelian
{
    var $db;
    
    function __construct(){
        $this->db = new PDO('sqlite:database.sqlite');
        $this->createTableRP();
    }
    
    //Fungsi Create Table riwayat_pembelian
    public function createTableRP(){
        $this->db->exec("CREATE TABLE IF NOT EXISTS riwayat_pembelian(
            id_pembelian INTEGER PRIMARY KEY AUTOINCREMENT, 
            username TEXT, 
            nama_dorayaki TEXT, 
            jumlah_beli INTEGER, 
            tglNwaktu TIMESTAMP,
            foreign key (username) references user(username),
            foreign key (nama_dorayaki) references dorayaki(nama_dorayaki)
            );");
    }

    //Fungsi Insert Table riwayat_pembelian
    public function insertRP($id_pembelian, $username, $nama_dorayaki, $jumlah_beli, $tglNwaktu){
        $this->db->exec("INSERT INTO riwayat_pembelian(id_pembelian, username, nama_dorayaki, jumlah_beli, tglNwaktu)
        VALUES($id_pembelian, $username, $nama_dorayaki, $jumlah_beli, $tglNwaktu);");
    }
    
    //Fungsi Update Table riwayat_pembelian
    public function updateRP($id_pembelian, $username, $nama_dorayaki, $jumlah_beli, $tglNwaktu){
        $this->db->exec("UPDATE riwayat_pembelian
        SET username=$username, 
        nama_dorayaki=$nama_dorayaki, 
        jumlah_beli=$jumlah_beli, 
        tglNwaktu=$tglNwaktu
        WHERE id_pembelian=$id_pembelian;");
    }
    
    //Fungsi Delete Table riwayat_pembelian
    public function deleteRP($id_pembelian, $username, $nama_dorayaki, $jumlah_beli, $tglNwaktu){
        $this->db->exec("DELETE FROM id_pembelian WHERE id_pembelian LIKE $id_pembelian;");
    }

    public function getAllRPRecord(){
        $result = $this->db->query('SELECT * FROM riwayat_pembelian;');
        foreach ($result as $row){
            echo $row['id_pembelian']."\n";
        }
    }

    public function getSpesificRPRecord($id_pembelian){
        $result = $this->db->query("SELECT * FROM  riwayat_pembelian WHERE id_pembelian=$id_pembelian;");
        foreach ($result as $row){
            echo $row['id_pembelian']."\n";
        }
    }
    
    // $result = $db->query('SELECT * FROM riwayat_pembelian');
    
    // foreach ($result as $rec) {
    //     print "<h1>".$rec['id_pembelian']."</h1>";
    //     print "<h1>".$rec['username']."</h1>";
    //     print "<h1>".$rec['nama_dorayaki']."</h1>";
    //     print "<h1>".$rec['jumlah_beli']."</h1>";
    //     print "<h1>".$rec['tglNwaktu']."</h1>";
    // }
}


// Testing
// $user_table = new User();

// $user_table->insertUser('suuuuusah','Mak','suuuuusah@gmail.com',0);

// $user_table->getAllUserRecord();


//Insert Dorayaki
// $dorayaki_table = new Dorayaki();

// $dorayaki_table->insertDorayaki('Strawberry', "https://japanische-lebensart.de/wp-content/uploads/2020/03/L600_dorayaki-erdbeer-mascarpone_2.jpg", 23000,3,0,'Rasa strawberry yang menyegarkan hati');
// $dorayaki_table->insertDorayaki('Chocolate', "http://bisnisusahaonline.com/wp-content/uploads/2018/08/dorayaki-chocolatos-1024x765.jpg",25000,3,0,'Rasa coklat yang lumer di mulut');
// $dorayaki_table->insertDorayaki('Vanilla','https://images-gmi-pmc.edge-generalmills.com/697ee8d6-6451-4fb2-a4d6-437399237050.jpg',24000,3,0,'Rasa vanilla yang menyejukkan');
// $dorayaki_table->insertDorayaki('Blackforest','https://img-global.cpcdn.com/recipes/0a0b20b8eab17564/680x482cq70/dorayaki-oreo-simple-cuma-5-bahan-utama-foto-resep-utama.jpg',30000,3,0,'Rasa blackforest yang sangat enak');
// $dorayaki_table->insertDorayaki('Milk','http://bisnisusahaonline.com/wp-content/uploads/2018/08/dorayaki-susu.jpg','22000',3,0,'Rasa vanilla yang menyejukkan');
// $dorayaki_table->insertDorayaki('Matcha','https://selerasa.com/wp-content/uploads/2016/11/images_Kue-Basah_dorayaki-kacang-hijau-1200x898.jpg',25000,3,0,'Rasa matcha khas jepang');
// $dorayaki_table->insertDorayaki('Peanut Butter','http://bisnisusahaonline.com/wp-content/uploads/2018/08/dorayaki-kacang.jpg',24000,3,0,'Rasa vanilla yang menyejukkan');
// echo "Sukses";

// $dorayaki_table->getAllDorayakiRecord();
// INSERT INTO dorayaki(nama_dorayaki,gambar,harga, stock, jumlah_terjual, deskripsi) VALUES('Strawberry', 'https://japanische-lebensart.de/wp-content/uploads/2020/03/L600_dorayaki-erdbeer-mascarpone_2.jpg', 23000,3,0,'Rasa strawberry yang menyegarkan hati');
//$dorayaki_table->deleteDorayaki('coklat');
?>
