<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "mahasiswa";

$connect = mysqli_connect($hostname, $username, $password, $database_name);
if ($connect->connect_error) {
    echo "KONEKSI DATABASE TIDAK TERSAMBUNG";
    die("error!");

} 
// else {
//     echo "Koneksi berhasil";
// }
?>