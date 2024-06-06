<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

require 'data.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h2>Data Mahasiswa</h2>
        <a href="mahasiswa_add.php" class="btn btn-success mb-3">Tambah Mahasiswa</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Angkatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['mahasiswa'] as $mhs): ?>
                <tr>
                    <td><?php echo $mhs['nim']; ?></td>
                    <td><?php echo $mhs['nama']; ?></td>
                    <td><?php echo $mhs['alamat']; ?></td>
                    <td><?php echo $mhs['angkatan']; ?></td>
                    <td>
                        <a href="mahasiswa_edit.php?nim=<?php echo $mhs['nim']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="mahasiswa_delete.php?nim=<?php echo $mhs['nim']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
