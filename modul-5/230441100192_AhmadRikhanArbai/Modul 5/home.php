<?php
session_start();

// Periksa apakah pengguna belum login, jika ya, redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Ambil nama pengguna dari sesi
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>Selamat datang, <?php echo $username; ?>!</h2>
    <a href="logout.php">Logout</a>
</body>
</html>
