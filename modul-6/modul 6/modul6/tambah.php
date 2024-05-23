<?php
    include 'koneksi.php';
    if(isset($_POST['tambah'])) {
        $nama = $_POST['nama']; 
        $nim = $_POST['nim']; 
        $umur = $_POST['umur'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $prodi = $_POST['prodi'];
        $jurusan = $_POST['jurusan']; 
        $asal_kota = $_POST['asal_kota'];

        $query = mysqli_query($koneksi, "INSERT INTO biodata VALUES ('','$nama','$nim','$umur','$jenis_kelamin','$prodi','$jurusan','$asal_kota')");
    }
    header('Location: data.php');
    exit;
?>