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

// Pastikan index yang diberikan valid
$index = isset($_GET['index']) ? $_GET['index'] : null;

// Ambil data mahasiswa berdasarkan index
$mahasiswa_to_edit = isset($dataMahasiswa[$index]) ? $dataMahasiswa[$index] : null;

if (!$mahasiswa_to_edit) {
    // Handle jika data tidak ditemukan, misalnya dengan redirect ke halaman lain
    header("Location: data.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="data.php">Data</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h2>Edit Data Mahasiswa</h2>
        <form method="post" action="edit_process.php">
            <input type="hidden" name="index" value="<?= $index ?>">
            <input type="text" name="nim" placeholder="NIM" value="<?= $mahasiswa_to_edit[0] ?>" required><br>
            <input type="text" name="nama" placeholder="Nama" value="<?= $mahasiswa_to_edit[1] ?>" required><br>
            <input type="text" name="alamat" placeholder="Alamat" value="<?= $mahasiswa_to_edit[2] ?>" required><br>
            <input type="text" name="angkatan" placeholder="Angkatan" value="<?= $mahasiswa_to_edit[3] ?>" required><br>
            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
