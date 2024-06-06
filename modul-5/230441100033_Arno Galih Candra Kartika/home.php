<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
            <p class="lead">Ini adalah halaman utama dari sistem informasi mahasiswa. Anda dapat mengelola data mahasiswa dengan mudah menggunakan fitur yang tersedia.</p>
            <hr class="my-4">
            <p>Gunakan tombol di bawah untuk mulai melihat data mahasiswa atau menambah data baru.</p>
            <a class="btn btn-primary btn-lg" href="mahasiswa.php" role="button">Data Mahasiswa</a>
        </div>

        <div class="mt-4">
            <h2>Tentang Sistem Informasi Mahasiswa</h2>
            <p>Sistem ini dirancang untuk memudahkan pengelolaan data mahasiswa. Anda dapat melakukan operasi CRUD (Create, Read, Update, Delete) pada data mahasiswa. Selain itu, sistem ini juga menyediakan fitur login untuk memastikan keamanan data.</p>
            <p>Fitur yang tersedia dalam sistem ini meliputi:</p>
            <ul>
                <li>Penambahan data mahasiswa baru</li>
                <li>Pengeditan data mahasiswa</li>
                <li>Penghapusan data mahasiswa</li>
                <li>Penampilan daftar mahasiswa yang sudah ada</li>
            </ul>
            <p>Kami harap sistem ini dapat membantu Anda dalam mengelola data mahasiswa dengan lebih efisien.</p>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
