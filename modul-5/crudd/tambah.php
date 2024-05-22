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

function tambahData($nim, $nama, $alamat, $angkatan) {
    global $dataMahasiswa;
    $dataMahasiswa[] = array($nim, $nama, $alamat, $angkatan);
}

if(isset($_POST['submit'])) {
    tambahData($_POST['nim'], $_POST['nama'], $_POST['alamat'], $_POST['angkatan']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="data.php">DATA</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>
    <nav class="container">
        <h3>Tambah Data Mahasiswa</h3>
        <form method="post" action="" >
            <input type="text" name="nim" placeholder="NIM" required><br>
            <input type="text" name="nama" placeholder="Nama" required><br>
            <input type="text" name="alamat" placeholder="Alamat" required><br>
            <input type="text" name="angkatan" placeholder="Angkatan" required><br>
            <input type="submit" name="submit" value="Tambah">
        </form>
    </nav>
</body>
</html>

