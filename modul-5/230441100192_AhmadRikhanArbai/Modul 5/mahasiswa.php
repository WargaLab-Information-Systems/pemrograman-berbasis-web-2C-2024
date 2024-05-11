<?php
session_start();

// Periksa apakah pengguna belum login, jika ya, redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Ambil nama pengguna dari sesi
$username = $_SESSION['username'];

// Data mahasiswa (contoh sederhana)
$mahasiswa = [
    ['nim' => '123456', 'nama' => 'John Doe', 'alamat' => 'Jl. Contoh No. 123', 'angkatan' => '2020'],
    ['nim' => '789012', 'nama' => 'Jane Smith', 'alamat' => 'Jl. Sample No. 456', 'angkatan' => '2019'],
    // Tambahkan data mahasiswa lainnya di sini
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <p>Selamat datang, <?php echo $username; ?>!</p>
    <a href="logout.php">Logout</a>
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Angkatan</th>
        </tr>
        <?php foreach ($mahasiswa as $mhs): ?>
        <tr>
            <td><?php echo $mhs['nim']; ?></td>
            <td><?php echo $mhs['nama']; ?></td>
            <td><?php echo $mhs['alamat']; ?></td>
            <td><?php echo $mhs['angkatan']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
