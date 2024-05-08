<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
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
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="mahasiswa.php">DATA</a></li>
                
            </ul>
        </nav>
    </header>

    <div class="container"> 
        <h2>Welcome</h2>
        <p>Selamat datang, <?php echo $username; ?>!</p>
        
    </div>
</body>
</html>
