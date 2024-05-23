<?php
 $db = mysqli_connect("localhost","root","","modul6");

 if ($db->connect_error) {
     echo "Gagal connect ke database";
     die("error!");
 }//  else {
 //     echo "Berhasil connect ke database";
 // }

?>