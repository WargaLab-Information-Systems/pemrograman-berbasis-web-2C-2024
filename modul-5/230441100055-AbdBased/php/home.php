<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('location: login.php');
        exit();
    }

    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/230441100055-AbdBased/css/beranda.css">
</head>
<body>
    <div class="container">
        <div class="atas">
            <h1>Selamat Datang di Website Kami <?php echo $username; ?></h1>
            <p>Klik Tombol dibawah ini untuk ke halaman Data Mahasiswa!</p>
            <img src="/230441100055-AbdBased/image/welcome.jpg" alt="">
        </div>
        <div class="bawah">
            <a href="datamahasiswa.php" class="tmbl-next">Next</a>
        </div>
    </div>
</body>
</html>