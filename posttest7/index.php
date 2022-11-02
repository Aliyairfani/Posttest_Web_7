<?php 
include 'db_parfum.php';
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
    <div class="fContainer">
        <div class = "tagline">
            <img src="prfm.png">
            <p class ="pembuka"> Mengapa parfum penting? <br>
                Parfum memiliki banyak manfaat, terutama aromaterapi, penghilang stres, dan efek relaksasi.Banyak wewangian khusus yang biasa digunakan untuk kesehatan fisik, 
                terutama untuk menghilangkan stres. Selain meningkatkan rasa percaya diri, parfum juga dapat meningkatkan daya ingat dan menimbulkan perasaan senang.
            </p>
        <input class="cari" type="text" style="text-align: left;"placeholder="Isi disini" required>
        <input class="button" type="button" value="Search"> 
        <?php 
        if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        echo "<b>Hasil pencarian : ".$cari."</b>";
        }
        ?>
        </div>
    </div>
    <footer>
        Copyright &copy; 2022
        Designed by AliyaIrfani
    </footer>
    <script src="main.js"></script>
</body>
</html>