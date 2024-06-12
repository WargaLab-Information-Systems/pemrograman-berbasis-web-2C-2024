<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #A0DEFF;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }
        .welcome {
            text-align: center;
            font-size: 24px;
            color: #555;
            padding: 10px;
            background-color: #F0F3FF;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .welcome span {
            color: #007bff; 
            font-weight: bold;
        }
        .logout {
        text-align: center;
        margin-top: 20px;
        }

        .logout a {
            color: #007bff;
            text-decoration: none;
            border: 1px solid #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .logout a:hover {
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>HALO!!!</h2>
        <div class="welcome">Selamat datang, <span><?php echo $username; ?></span>!</div>
        <div class="logout"><a href="mahasiswa.php">Data Mahasiswa</a></div>
    </div>
</body>
</html>
