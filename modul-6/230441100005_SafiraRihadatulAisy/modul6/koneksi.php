<?php 
      
    $server   = "localhost";
    $username = "root";
    $password = "";
    $database = "mahasiswa";
  
    //sambungkan ke database
    $sambungan = mysqli_connect($server, $username, $password, $database);
  
    if (!$sambungan) //jika tidak berhasil disambungkan
    {
        echo "<h1>Sambungan Gagal</h1>";
    }
  
?>