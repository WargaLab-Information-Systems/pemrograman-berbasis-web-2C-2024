<?php
session_start(); 
// Ambil username dari URL jika tersedia
$username = isset($_GET['username']) ? $_GET['username'] : '';
// Jika tidak ada session username dan tidak ada username di URL, kembalikan ke halaman login
if (!isset($_SESSION['username']) && empty($username)) {
    header("Location: login1.php");
    exit;
}
// Jika session username belum diset, tetapi ada username di URL, atur session username
if (!isset($_SESSION['username']) && !empty($username)) {
    $_SESSION['username'] = $username;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="navbar">
            <a href="halaman1.php">Home</a>
            <a href="halaman2.php">Data</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <div class="content">
        <h1>Welcome, <?php echo $_SESSION["username"]; ?>!</h1>
        <h3>Selamat datang di halaman kami! klik data pelajar pada navbar jika anda ingin memasukkan biodata anda</h3><br>
        <h3>Dan jika ingin keluar bisa klik logout pada navbar</h3>
        <h6>HAVE A NICE DAY!</h6>
    </div>
</body>
</html>