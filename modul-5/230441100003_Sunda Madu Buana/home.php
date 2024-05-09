<?php

session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username']

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .home {
            width: 300px;
            margin: 100px auto;
            background-color: lightcyan;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        a {
            color: #777;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
            color: blue;
        }
    </style>
</head>
<body>
    <center>
        <div class="home">
            <h2>Selamat Datang <?php echo $username; ?></h2><br><br>
            <p><a href="mahasiswa.php">Lihat Data Mahasiswa</a></p><br>
            <p><a href="logout.php">Logout</a></p>
        </div>
    </center>
</body>
</html>
