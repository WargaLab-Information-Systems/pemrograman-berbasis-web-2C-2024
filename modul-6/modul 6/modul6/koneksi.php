<?php
    $koneksi = mysqli_connect("localhost", "root", "", "mahasiswa_db");

    if(!$koneksi) {
        echo "<script>alert(koneksi gagal)</script>";
    }
?>