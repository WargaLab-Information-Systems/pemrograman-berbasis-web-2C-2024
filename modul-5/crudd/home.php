<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username']; //menampung
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="data.php">Data</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container"> 
         <h1>Welcome , <?php echo $username; ?>!</h1>  <!-- nampilin -->
        <marquee  direction="left" scrollamount="15"><h1>Selamat datang di Website Penyedia Layanan Data</h1></marquee>
    </div>
</body>
</html>
