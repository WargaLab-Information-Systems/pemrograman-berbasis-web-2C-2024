<?php
    include 'koneksi.php';
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $query = mysqli_query($koneksi, "DELETE FROM biodata WHERE id = '$id'");
    }
    header('Location: mahasiswa.php');
    exit;
?>