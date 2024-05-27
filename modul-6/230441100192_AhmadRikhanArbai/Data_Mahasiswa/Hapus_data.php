<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM data_mahasiswa WHERE id_mahasiswa='$id'");
    header('location:index.php');
?>