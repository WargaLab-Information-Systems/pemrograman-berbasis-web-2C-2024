<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "akun";

$db = mysqli_connect ($hostname,$username,$password,$database);
if($db->connect_error){
    echo "gak nyambung";
    die("error");
}
?>