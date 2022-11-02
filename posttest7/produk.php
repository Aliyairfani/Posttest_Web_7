<?php

    require 'config.php';

    if(isset($_POST['kirim'])){
        $nama_produk = $_POST['nama_produk'];
        $deskripsi = $_POST['deskripsi'];

        $gambar = $_FILES['gambar']['name'];
        $x = explode('.', $gambar);
        
        $ekstensi = strtolower(end($x));
        $gambar_baru = "$nama_produk.$ekstensi";

        $tmp = $_FILES['gambar']['tmp_name'];

        if(move_uploaded_file($tmp, "foto/".$gambar_baru)){
            $query = "INSERT INTO datauser (nama_produk, deskripsi, gambar) 
            VALUES ('$nama_produk','$deskripsi', '$gambar_baru')";
            $result = $db->query($query);     

            if($result){
                echo "
                    <script>
                        alert('Data Berhasil Terkirim');
                        document.location.href='tampilan.php';
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
        <label for="">Nama Produk :</label>
        <input type="text" name="nama_produk"><br>

        <label for="">Upload gambar Parfum :</label>
        <input type="file" name = "gambar"><br><br>

        <label for="">Deskripsi :</label>
        <input type="text" name="desk" required><br>

        <input type="submit" name="kirim">
    </form>
    <footer>
        Copyright &copy; 2022
        Designed by AliyaIrfani
    </footer>
    <script src="main.js"></script>
</body>
</html>