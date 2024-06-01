<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: index.php?pesan=belum_login");
    exit();
}

// Ambil nama pengguna dari session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="style.css">
    <style> 
        .container {
    background-color: #fff;
    padding: 50px;
    margin-top: 50px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 600px;
    text-align: center;
    border-radius: 10px;
}

.btn {
    background-color: blue;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    margin-bottom: 10px; /* Tambahkan margin bawah untuk memberi jarak antara tombol */
}

.btn:hover {
    background-color: darkblue;
}

.button-container {
    margin-top: 10px; /* Tambahkan margin atas untuk memberi jarak antara grup tombol */
}

body {
    font-family: Arial, sans-serif;
}

        
    </style>
</head>
<body>
    <center>
        <div class="container">
            <h1>Selamat Datang, <?php echo htmlspecialchars($username); ?>!</h1>
            <p>Anda telah berhasil login.</p>
            <a href="datamhs.php" class="btn">Lanjut ke Halaman Selanjutnya</a> 
            <br>
            <br>
            <br>
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </center>
</body>
</html>
