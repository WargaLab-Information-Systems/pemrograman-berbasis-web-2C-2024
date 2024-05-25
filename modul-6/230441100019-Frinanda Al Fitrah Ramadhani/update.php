<?php
    include 'koneksi.php';
    if(isset($_POST['tambah'])) {
        $id = $_POST['id']; 
        $nama = $_POST['nama']; 
        $nim = $_POST['nim']; 
        $umur = $_POST['umur'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $prodi = $_POST['prodi'];
        $jurusan = $_POST['jurusan']; 
        $asal_kota = $_POST['asal_kota'];

        $query = mysqli_query($koneksi, "UPDATE biodata set nama='$nama',nim='$nim',umur='$umur',jenis_kelamin='$jenis_kelamin',prodi='$prodi',jurusan='$jurusan',asal_kota='$asal_kota' WHERE id = '$id'");
    }
    header('Location: mahasiswa.php');
    exit;
?>