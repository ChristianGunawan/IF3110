<?php
    require "../database.php";
    
    $db = new PDO('sqlite:../database.sqlite');

    
    if (isset($_POST['isUsernameFilled'])) {
        $username_id = $_POST['username_id'];
        // $username_id_query = sqlite_query($connection, $username_id);
        
        // Checking
        if (!isUsernameAvail($username_id)){
            echo "Username sudah dipakai";
        } else{
            echo "Username available";   
        }
        return;
    }

    // echo $_POST['username_id'];
    if (isset($_POST['isEmailFilled'])) {
        $email_id = $_POST['email_id'];
        
        // Checking
        if (!isEmailAvail($email_id)){
            echo "Email sudah dipakai";
        } else{
            echo "Email available";
        }
        return;
    }

    
    if (isset($_POST['register'])) {
        // semua field harus terisi
        if ( $_POST["username"] == "" || $_POST["email"] == "" || $_POST["password"] == "" || $_POST["cpassword"] == "") {
            $message = "<div class='invalid_input'>Data belum semua terisi</div>";
        } else {
            if (isRegistered($_POST)) {
                echo "<script>
                        alert('user baru berhasil ditambahkan')
                    </script>";
                header("location:login.php");
            }
        }
    }

    function isRegistered($data) {
        $db = new PDO('sqlite:../database.sqlite');
        $username = stripslashes($data["username"]);
        $email = $data["email"];
        $password = $data["password"];
        $password2 = $data["cpassword"];
    
        // cek username sudah ada atau belum
        if (!isUsernameAvail($username)) {
            echo "  <script>
                    alert('Username sudah dipakai !');
                    </script>";
            return false;
        }

        // cek email sudah ada atau belum
        if (!isEmailAvail($email)) {
            echo "  <script>
                    alert('Email sudah dipakai !');
                    </script>";
            return false;
        }
    
        // cek konfirmasi password
        if ($password !== $password2) { // pw dan pw2 berbeda
            echo "  <script>
                    alert('Konfirmasi password tidak sesuai !');
                    </script>";
            return false;
        } else { //pw dan pw2 sama
    
            // hash password
            $pass = password_hash($password, PASSWORD_DEFAULT);
    
            // insert to Database
            $db->exec("INSERT INTO user(username, pass, email, is_admin) VALUES('$username', '$pass', '$email', 0);");
            return true;
        }
    }

    function isUsernameAvail($username) {
        $db = new PDO('sqlite:../database.sqlite');
        $result = $db->query("SELECT * FROM user;");
        foreach ($result as $rec) {
            if ($username == $rec['username']){
                return false;
            }
        }
        return true;
    }

    function isEmailAvail($email) {
        $db = new PDO('sqlite:../database.sqlite');
        $result = $db->query("SELECT * FROM user;");
        foreach ($result as $rec) {
            if ($email == $rec["email"]){
                return false;
            }
        }
        return true;
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Webede - Register</title>
    <link href="../css/register.css" rel="stylesheet" type="text/css">
    <!-- <script type="text/javascript" src="js/register.js?v=2"></script> -->

    <!-- Jquery -->
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
    <div class="registerform">

        <h1 class="reginto"> Webede Store </h1>

        <form method="POST">
            Username : <input class="form-control username" type="text" name="username" id="username" placeholder="Username" required autofocus><br>
            <p id="check_user"></p>
            Email : <input class="form-control email" type="email" placeholder="Email" name="email" id="email" required><br>
            <p id="check_email"></p>
            Password : <input class="form-control pass" type="password" placeholder="Password" name="password" id="password" required><br>
            Confirm Password : <input class="form-control cpass" type="password" placeholder="Password" name="cpassword" id="cpassword" required><br>
            <input class="submit" type="submit" name="register" id="register">
        </form>

        <p>Already have account ?</p>

        <form method="POST" action="login.php">
            <button class="tologIn">Login Here</button>
        </form>
    </div>

    <script type="text/javascript" src="js/register.js?v=2"></script>
</body>
</html>