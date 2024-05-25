<?php
    $koneksi = mysqli_connect("localhost", "root", "", "mahasiswa");

    if(!$koneksi) {
        echo "<script>alert(koneksi gagal)</script>";
    }
?>