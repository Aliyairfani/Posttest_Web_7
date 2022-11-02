<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "review_perfume";

$db = mysqli_connect($server, $username, $password, $db_name);

if(!$db){
    die("Database tidak terhubung");
}