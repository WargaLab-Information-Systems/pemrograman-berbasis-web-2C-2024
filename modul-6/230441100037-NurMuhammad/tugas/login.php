<?php
    include 'koneksi.php';

    if(!isset($_SESSION)) { 
        session_start(); 
    }
    if(isset($_SESSION['user'])) {
        header('Location: index.php?halaman1');
    }
    $username = $email = $password = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Document</title>
</head>
<body style="background-image: url(img/3.jpg); background-size: cover; background-position: center;">
    <div class="login">
        <div class="gambar">
            <img src="img/1.png" alt="">
        </div>
        <form method="POST" action="koneksi.php">
            <h1>Login</h1>
            <?php inputError(); ?>
            <div class="form-input">
                <label for="username">Username:</label>
                <input value="<?= $username; ?>" name="username" id="username" type="text" placeholder="Username">
            </div>
            <div class="form-input">
                <label for="email">Email:</label>
                <input value="<?= $email; ?>" name="email" id="email" type="email" placeholder="Email">
            </div>
            <div class="form-input">
                <label for="password">Password:</label>
                <input value="<?= $password; ?>" name="password" id="password" type="password" placeholder="Password">
            </div>
            <div class="form-input">
                <button class="reset" type="reset" onclick="return loginOrRegister()"><i class="fa-solid fa-arrows-left-right"></i></button>
                <button class="submit" type="submit" name="login" onclick="return validasiLogin(true)">Submit</button>
            </div>
        </form>
    </div>
    <script src="script/script.js"></script>
</body>
</html>