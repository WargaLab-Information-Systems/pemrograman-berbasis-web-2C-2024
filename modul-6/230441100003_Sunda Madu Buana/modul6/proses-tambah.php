<?php 

include 'koneksi.php';
 
// mengambl data yg di krm dri form
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$umur = $_POST['umur'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$prodi = $_POST['prodi'];
$jurusan = $_POST['jurusan'];
$asal_kota = $_POST['asal_kota'];
 
// menginput dta ke dtbse dalam tabel data_mhs
mysqli_query($koneksi,"INSERT INTO data_mhs (nama, nim, umur, jenis_kelamin, prodi, jurusan, asal_kota) VALUES ('$nama', '$nim', '$umur', '$jenis_kelamin', '$prodi', '$jurusan', '$asal_kota')");
 
header("location:index.php");
 
?>