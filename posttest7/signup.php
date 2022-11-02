<?php

    require 'config.php';

    if(isset($_POST['kirim'])){
        $nama_lengkap = $_POST['nama_lengkap'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $email = $_POST['email'];
        $tanggal_waktu = date("d-m-Y H:i:s a");

        $gambar = $_FILES['gambar']['name'];
        $x = explode('.', $gambar);
        
        $ekstensi = strtolower(end($x));
        $gambar_baru = "$nama_lengkap.$ekstensi";

        $tmp = $_FILES['gambar']['tmp_name'];

        if(move_uploaded_file($tmp, "foto/".$gambar_baru)){
            $query = "INSERT INTO datauser (nama_lengkap, tanggal_lahir, email, tanggal_waktu, gambar) 
            VALUES ('$nama_lengkap','$tanggal_lahir','$email', '$tanggal_waktu', '$gambar_baru')";
            $result = $db->query($query);     

            if($result){
                echo "
                    <script>
                        alert('Data Berhasil Terkirim');
                        document.location.href='signin.php';
                    </script>
                ";
            }else {
                echo "
                    <script>
                        alert('Data Gagal Terkirim');
                    </script>
                ";
            }
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
    <title>Sign Up</title>
</head>
<body>
<nav class="wrapper">
        <div class="brand">
            <div class="first">review</div>
            <div class="last">perfume</div>
        </div>
        <ul class="nav">
            <li><a href="index.php">home</a></li>
            <li><a href="aboutme.html">about me</a></li>
            <li><a href="signup.php">sign up</a></li>
        </ul>
    </nav>
    <div id="theme">
        <div onclick="setDarkMode(true)" id="darkBtn" class="icon"><img src="ikon.webp"></div>
        <div onclick="setDarkMode(false)" id ="lightBtn" class="is-hidden"><img src="ikon.webp" color = "white"></div>
    </div>
    <form action="" method="post" id="pendaftaran" enctype="multipart/form-data">
    <h2>Daftarkan Diri Anda</h2><br>
        <a href="signin.php">Sudah memiliki Akun?</a><br><br>
        <label for="">Nama Lengkap :</label>
        <input type="text" name="nama_lengkap"><br>

        <label for="">Tanggal lahir :</label>
        <input type="date" name="tanggal_lahir"><br>

        <label for="">Email : </label>
        <input type="email" name="email" required><br>

        <label for="">Password :</label>
        <input type="password" name="pw" required><br>

        <label for="">Foto Profile :</label>
        <input type="file" name = "gambar"><br><br>

        <input type="submit" name="kirim">
    </form>
    <footer>
        Copyright &copy; 2022
        Designed by AliyaIrfani
    </footer>
    <script src="main.js"></script>
</body>
</html>