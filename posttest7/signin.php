<?php 
    session_start();
    require 'config.php';

    if(isset($_POST['signin'])){
        $nama_lengkap = $_POST['nama_lengkap'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM akun WHERE nama_lengkap = '$nama_lengkap'";
        $result = $db->query($sql);

        // cek akun ada atau tidak
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $nama_lengkap = $row['nama_lengkap'];

            // cek password valid atau tidak
            if(password_verify($password, $row['psw'])){

                $_SESSION['masuk'] = $nama_lengkap;

                echo "<script>
                    alert('Selamat Datang $nama_lengkap');
                    document.location.href = 'index.php';
                    </script>";
            } else{
                echo "<script>
                    alert('nama_lengkap dan Password salah!');
                    </script>";
            }
        } else{
            echo "<script>
                    alert('nama_lengkap tidak terdaftar!, Silahkan Sign up terlebih dahulu');
                    </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>review perfume</title>
    <link rel="icon" href="btlprfm.webp">
</head>
<body>
    <nav class="wrapper">
        <div class="brand">
            <div class="first">review</div>
            <div class="last">perfume</div>
            <script>
                document.getElementsByClassName('brand')[0].onclick = ucapan
                
                function ucapan (){
                    document.getElementsByClassName('brand')[0].innerHTML = "Welcome to our store";
                }
            </script>
        </div>
        <ul class="nav">
            <li><a href="index.php">home</a></li>
            <li><a href="aboutme.html">about me</a></li>
            <li><a href="signup.php">sign up</a></li>
        </ul>  
    </nav>
    <div id="theme">
        <div onclick="setDarkMode(true)" id="darkBtn" class="icon"><img src="ikon.webp"></div>
        <div onclick="setDarkMode(false)" id ="lightBtn" class="is-hidden"><img src="ikon.webp"></div>
    </div>
    <form action="" method="post" class = "masuk">
        <a href="admin.php">Masuk sebagai admin</a><br><br>
        <label for="">Nama Lengkap :</label>
        <input type="text" name="nama_lengkap"><br>

        <label for="">Password :</label>
        <input type="password" name="pw" required><br>

        <input type="submit" name="login" value="Login" class="submit"><br><br>
    </form>
    <footer>
        Copyright &copy; 2022
        Designed by AliyaIrfani
    </footer>
    <script src="main.js"></script>
</body>
</html>