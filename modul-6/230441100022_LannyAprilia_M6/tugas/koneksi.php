<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "login";
$port = 3306;
 
$conn = mysqli_connect($server, $user, $pass, $database, $port);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}

?>