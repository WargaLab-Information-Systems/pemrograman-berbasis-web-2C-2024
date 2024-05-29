<?php
//variabel koneksi dibuat untuk mengkoneksikan database mahasiswa
//apanila tidak bisa nyambung ke server akan muncul informasi"database gagal dikoneksikan"
$koneksi = mysqli_connect('localhost','root','','mahasiswa') or die('Database gagal dikoneksikan');
?>