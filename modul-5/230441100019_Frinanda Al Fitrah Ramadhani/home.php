<?php
    if(!isset($_SESSION)) { 
        session_start(); 
        if(!isset($_SESSION['user'])) {
            header('Location: index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav class="navbar">
        <a href="home.php" class="navbar-logo">Data<span>Mahasiswa.</span></a>
        <div class="navbar-nav">
            <a href="home.php">Beranda</a>
            <a href="mahasiswa.php">Data</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <section class="beranda">
        <main class="content">
            <h1><span>Selamat</span> Datang <?= $_SESSION['user']['username'] ?></h1>
            <p>Data mahasiswa adalah platform online yang menyajikan informasi singkat dan relevan mengenai para mahasiswa , seperti NIM, Nama, Jurusan, Alamat dan Angkatan.</p>
            <a href="mahasiswa.php" class="cta">Lihat Data</a>
        </main>
    </section>
    <footer>
        <div class="kredit">
            <p>Created by <a href="#">frinandaalfitrahramadhani</a>. |&Copy; 2024.</p>
        </div>
    </footer>
</body>
</html>