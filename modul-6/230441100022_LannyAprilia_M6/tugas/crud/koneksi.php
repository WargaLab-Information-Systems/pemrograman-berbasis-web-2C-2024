<?php

$host="localhost";
$user="root";
$pass="";
$db="crud";
$port=3306;
$conn = new mysqli($host,$user,$pass,$db,$port);
if(!$conn){
    echo "koneksi gagal:".$conn->connect_error;
}
?>