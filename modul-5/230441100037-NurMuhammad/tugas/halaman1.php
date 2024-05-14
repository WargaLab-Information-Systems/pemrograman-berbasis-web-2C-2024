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

    <!-- NAVBAR -->
    <div class="navbar sidebar-active">
        <!-- SIDEBAR -->
        <div class="sidebar active">
            <div class="logo">
                <h1>My Website</h1>
            </div>
            <div class="nav-list">
                <div class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    <a href="halaman1.php">Home</a>
                </div>
                <div class="nav-link">
                    <i class="fa-solid fa-user-tie"></i>
                    <a>Dosen</a>
                </div>
                <div class="nav-link">
                    <i class="fa-solid fa-user-graduate"></i>
                    <a href="halaman2.php">Mahasiswa</a>
                </div>
                <div class="nav-link">
                    <i class="fa-solid fa-rectangle-list"></i>
                    <a>Mata Kuliah</a>
                </div>
            </div>
            <div class="logout">
                <a href="logout.php">Logout <i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>
        <!-- sidebar -->
        <button id="humberger-menu">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="nav-items">
            <div class="search">
                <form>
                    <input type="text" placeholder="Search....">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="profil">
                <p><?= $_SESSION['user']['username']; ?></p>
                <div class="gambar">
                    <img src="https://assets-a1.kompasiana.com/items/album/2021/03/24/blank-profile-picture-973460-1280-605aadc08ede4874e1153a12.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- navbar -->

    <div class="container sidebar-active">
        <div class="home">
            <h1>Selamat Datang <?= $_SESSION['user']['username']; ?></h1>
            <div class="info">
                <div class="kotak">
                    <div class="gambar"><i class="fa-solid fa-user-tie"></i></div>
                    <div class="desk">
                        <h4>Dosen</h4>
                        <p>500</p>
                    </div>
                </div>
                <div class="kotak">
                    <div class="gambar"><i class="fa-solid fa-user-graduate"></i></div>
                    <div class="desk">
                        <h4>Mahasiswa</h4>
                        <p>1.000.000</p>
                    </div>
                </div>
                <div class="kotak">
                    <div class="gambar"><i class="fa-solid fa-rectangle-list"></i></div>
                    <div class="desk">
                        <h4>Mata Kuliah</h4>
                        <p>10</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>