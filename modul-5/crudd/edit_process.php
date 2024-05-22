<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['dataMahasiswa'])) {
    $_SESSION['dataMahasiswa'] = array();
}

$dataMahasiswa =& $_SESSION['dataMahasiswa'];

if(isset($_POST['submit'])) {
    $index = $_POST['index'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];

    // Update data mahasiswa
    $dataMahasiswa[$index] = array($nim, $nama, $alamat, $angkatan);

    // Redirect ke halaman data setelah update
    header("Location: data.php");
    exit;
}
?>
