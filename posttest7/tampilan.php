<?php 
    require 'config.php';

    $result = mysqli_query($db, "SELECT * FROM datauser");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tampilan.css">
    <title>Tampilan Data</title>
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
    </div><br>
    <center>
    <h3>Data User</h3><br><br>
    </center>
    <center>
    <a href="signup.php">Tambah Data</a><br>
    </center>
    <center><table border='1'>
        <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>E-mail</th>
            <th>Tanggal Signup</th>
            <th>Gambar</th>
            <th colspan='2'>action</th>
        </tr>
        <?php 
            $i = 1;
            while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?=$i; ?></td>
            <td><?=$row['nama_lengkap']?></td>
            <td><?=$row['tanggal_lahir']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['tanggal_waktu']?></td>
            <td><img src="foto/<?=$row['gambar']?>" alt="" width="100px"></td>
            <td><a href="edit.php?id=<?=$row['id']?>"> edit </a></td>
            <td><a href="hapus.php?id=<?=$row['id']?>">hapus</a></td>
        </tr>
            <?php 
             $i++;
                }
            ?>
    </table></center>
    <footer>
        Copyright &copy; 2022
        Designed by AliyaIrfani
    </footer>
    <script src="main.js"></script>
</body>
</html>