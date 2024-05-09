<?php
session_start();

if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}

$username = $_SESSION['login_user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang, <?php echo $username; ?>!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-image: url(https://images.pexels.com/photos/162622/facebook-login-office-laptop-business-162622.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);
        }
        .container {
            width: 80%;
            max-width: 800px;
            margin: 100px auto;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(0, 0, 0, 0);
            box-shadow: 0 0 10px rgba(0, 0, 0, 5);
        }
        h2 {
            font-size: 36px;
            color: #333333;
            margin-bottom: 20px;
        }
        .welcome-message {
            font-size: 24px;
            color: #00000;
            margin-top: 20px;
        }
        .link-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .home-link {
            /* display: inline-block; */
            margin-top: 50px;
            font-size: 18px;
            color: #fff;
            text-decoration: none;
            padding-bottom: 5px;
        }
        .logout-link{
            /* display: inline-block; */
            margin-top: 50px;
            font-size: 18px;
            color: #0400ff;
            text-decoration: none;
            padding-bottom: 5px;
            margin-left:20px;
        }
        .welcome-link {
            background-color: #ff3600;
        }
        .welcome-link:hover {
            background-color: #e62e00;
        }
        .logout-link:hover,.home-link a:hover {
            color: #ff3600;
        }
        .logout-link a,.home-link a {
            margin-top: 100px;
            text-decoration: none;
            color: #0400ff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Selamat Datang, <?php echo $username; ?>!</h2>
        <p class="welcome-message">Terima kasih telah login. Anda sekarang dapat melihat halaman yang hanya bisa diakses setelah login.</p>
        <div class="link-container">
            <div class="home-link">
                <a href="datamhs.php">Halaman Data Mahasiswa</a>
            </div>
            <div class="logout-link">
                <a href="logout.php" class="logout-link">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
