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

function hapusData($index) {
    global $dataMahasiswa;
    array_splice($dataMahasiswa, $index, 1);
}

if(isset($_GET['action']) && $_GET['action'] == 'delete') {
    hapusData($_GET['index']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="data.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="data.php">Data</a></li>
                <li><a href="tambah.php">Tambah</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <table>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Angkatan</th>
                <th>Action</th>
            </tr>
            <?php foreach ($dataMahasiswa as $index => $mahasiswa): ?>
                <tr>
                    <td><?= $mahasiswa[0] ?></td>
                    <td><?= $mahasiswa[1] ?></td>
                    <td><?= $mahasiswa[2] ?></td>
                    <td><?= $mahasiswa[3] ?></td>
                    <td>
                        <a href='edit.php?index=<?= $index ?>'>Edit</a>
                        <a href='?action=delete&index=<?= $index ?>'>Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
</body>
</html>
