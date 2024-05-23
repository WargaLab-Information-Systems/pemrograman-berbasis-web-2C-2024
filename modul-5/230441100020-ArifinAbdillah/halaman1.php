<?php 
    if(!isset($_SESSION)) { 
        session_start(); 
        if(!isset($_SESSION['user'])) {
            header('Location: login.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="logo">
            <a href="halaman1.php">Web Form  <span class="p">Mahasiswa</a>
        </div>
        <ul class="nav-links">
            <li><a href="halaman1.php">Home</a></li>
            <li><a href="halaman2.php">Data Mahasiswa</a></li>
            <div class="logout">
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a> 
            </div>
        </ul>
        </div>
    </nav>
    <div class="container">
        <h1>Selamat Datang <?= $_SESSION['user']['username'] ?></h1>
    </div>
</body>
</html>