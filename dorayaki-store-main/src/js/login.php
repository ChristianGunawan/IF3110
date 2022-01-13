<?php
    session_start();
    require "../database.php";
    
    $db = new PDO('sqlite:../database.sqlite');

    
    if(isset($_COOKIE['type'])){
        header("location:dashboard.php");
        exit;
    }

    if (isset($_POST["login"])){
        // Kasus Username atau Password Kosong
        if(empty($_POST["username"]) || empty($_POST["password"])){
            $message = "<div class='invalid_input'>Username atau Password belum terisi</div>";
        }
        else{
            $username = $_POST["username"];
            $password = $_POST["password"];
            $result = $db->query("SELECT * FROM user WHERE username = '$username';");

            // Ketemu User
            if ($result){
                $isAdmin = false;
                foreach ($result as $rec) {
                    $usernameDB = $rec['username'];
                    $passwordDB = $rec['pass'];
                    $emailDB = $rec['email'];
                    $is_adminDB = $rec['is_admin'];
                }
                
                //Cek Password (Enkripsi)
                if(password_verify($_POST["password"], $passwordDB)){
                
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $_POST['username'];
                    // $_SESSION['is_admin'] = $is_adminDB;
                    if($is_adminDB == 1) {
                        $_SESSION['is_admin'] = true;
                    }


                    // Jika berhasil login, maka diberi waktu 1 jam untuk akses web
                    setcookie("type", $is_adminDB, time()+3600);
                    header("Location: dashboard.php");
                    exit;

                } else{     //Jika password salah
                    $message = "<div class='invalid_input'>Username atau Password belum benar</div>";
                    echo "<script>
                            alert('username atau password salah !')
                          </script>";
                }
            } 
            else{       // Tidak ketemu user
                echo "0 user";
                $message = "<div class='invalid_input'> Username atau Password belum benar</div>";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Webede - Login</title>
    <link href="../css/login.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="loginform">

        <h1 class="loginto"> Webede Store </h1>

        <form method="POST">
            Username : <input class="user" type="text" name="username" id="username" placeholder="Username" autofocus><br>
            Password : <input class="pass" type="password" placeholder="Password" name="password" id="password"><br>
            <input class="submit" type="submit" name="login" id="login">
        </form>

        <p>Not yet have account ? </p>

        <form method="POST" action="register.php">
            <button class="toReg">Register Here</button>
        </form>
    </div>
</body>
</html>