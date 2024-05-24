<?php 
    if(!isset($_SESSION)) { 
        session_start(); 
    }
    if(!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    include './../koneksi.php';
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./../css/dashboard.css">
    <title>Document</title>
</head>
<body style="background-image: url(./../img/3.jpg); background-size: cover; background-position: center;">

    <!-- NAVBAR -->
    <div class="navbar sidebar-active">
        <!-- SIDEBAR -->
        <div class="sidebar active">
            <div class="logo">
                <h1>Dashboard</h1>
            </div>
            <div class="nav-list">
                <div class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    <a href="index.php?home">Home</a>
                </div>
                <div class="nav-link">
                    <i class="fa-solid fa-user-tie"></i>
                    <a href="index.php?dosen">Dosen</a>
                </div>
                <div class="nav-link">
                    <i class="fa-solid fa-user-graduate"></i>
                    <a href="index.php?mahasiswa">Mahasiswa</a>
                </div>
                <div class="nav-link">
                    <i class="fa-solid fa-rectangle-list"></i>
                    <a href="index.php?fakultas">Fakultas</a>
                </div>
            </div>
            <div class="logout">
                <a href="./../logout.php">Logout<i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>
        <!-- sidebar -->
        <button id="humberger-menu">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="nav-items">
            <div class="profil">
                <p><?= $_SESSION['user']['username']; ?></p>
                <a href="index.php?profil" class="gambar">
                    <img src="./../img/profil.png" alt="">
                </a>
            </div>
        </div>
    </div>
    <!-- navbar -->

    <?php
        if(isset($_GET['home'])){
          include 'views/home.php';
        //   Mahasiswa
        } else if(isset($_GET['mahasiswa'])) {
          include 'views/mahasiswa.php';
        } else if(isset($_GET['formMahasiswa'])) {
          include 'views/formMahasiswa.php';
        } else if(isset($_GET['detailMahasiswa'])) {
          include 'views/detailMahasiswa.php';
        //   Dosen
        } else if(isset($_GET['dosen'])) {
          include 'views/dosen.php';
        //   Fakultas
        } else if(isset($_GET['fakultas'])) {
          include 'views/fakultas.php';
        } else if(isset($_GET['formFakultas'])) {
          include 'views/formFakultas.php';
        // profil
        } else if(isset($_GET['profil'])) {
            include 'views/profil.php';

        // 
        } else {
          include 'home.php';
        }
    ?>
    
    <script src="./../script/main.js"></script>
</body>
</html>