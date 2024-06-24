<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
</style>
<body>
    <div class="container">
        <h2>HALLO</h2>
        <p>Selamat datang, <?php echo $username; ?>!</p>
        <a href="mahasiswa.php" class="logout-button">Data</a>
    </div>
</body>
</html>