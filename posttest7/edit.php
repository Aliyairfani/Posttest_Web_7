<?php

    date_default_timezone_set("Asia/Singapore");

    require 'config.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $result = mysqli_query($db, 
        "SELECT * FROM datauser WHERE id='$id'");
    $row = mysqli_fetch_array($result);

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
            $query =    "UPDATE datauser SET 
                            nama_lengkap='$nama_lengkap',
                            tanggal_lahir='$tanggal_lahir',
                            email='$email',
                            tanggal_waktu='$tanggal_waktu',
                            gambar='$gambar_baru'
                        WHERE id='$id'";
            $result = $db->query($query);

            if($result){
                echo "
                    <script>
                        alert('Data Berhasil di Update');
                        document.location.href = 'tampilan.php';
                    </script>
                ";
            }else {
                echo "
                    <script>
                        alert('Data Gagal di Update');
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
    <link rel="stylesheet" href="tampilan.css">
    <title>edit data</title>
</head>
<body>
    <br><br><center><h3>Edit Data User</h3></center><br><br>
    <center><form action="" method="post" enctype="multipart/form-data">
        <label for="">Nama Lengkap : </label><br>
        <input type="text" name="nama_lengkap" value=<?=$row['nama_lengkap']?>><br><br>

        <label for="">Tanggal Lahir : </label><br>
        <input type="text" name="tanggal_lahir" value=<?=$row['tanggal_lahir']?>><br><br>

        <label for="">Email : </label><br>
        <input type="text" name="email" value=<?=$row['email']?>><br><br>

        <label for="">Upload gambar Parfum :</label>
        <input type="file" name = "gambar" value=<?=$row['gambar']?>><br><br>
        
        <input type="submit" name="kirim">
    </form></center>
</body>
</html>