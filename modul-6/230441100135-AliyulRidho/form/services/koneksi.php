<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "mahasiswa";

$db = mysqli_connect($hostname, $username, $password, $database_name);
if ($db->connect_error) {
    echo "KONEKSI DATABASE TIDAK TERSAMBUNG";
    die("error!");



}

?>