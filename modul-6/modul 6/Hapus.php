<?php
    //mengkoneksikan file php lain
    include "koneksi.php";
    //variabel id mengambil data dari form degan get
    $id = $_GET['id'];
    //variabel query menampung perintah hapus data dari tabel biosata berdasarkan id mahasiswa
    //$koneksi=mengkoneksikan  ke database mahasiswa
    $query = mysqli_query($koneksi, "DELETE FROM biodata WHERE id_mahasiswa='$id'");
    header('location:index.php');
?>