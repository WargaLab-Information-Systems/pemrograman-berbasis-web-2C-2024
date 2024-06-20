<?php
    if(!isset($_SESSION)) { 
        session_start(); 
        if(isset($_SESSION['user'])) {
            header('Location: halaman1.php');
        }
        if (isset($_POST['submit'])) {
            $_SESSION['user']['username'] = $_POST['username'];
            $_SESSION['user']['password'] = $_POST['password'];
            header('Location: halaman1.php');
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="login">
        <div class="gambar">
            <img src="undraw_welcome_cats_thqn.png" alt="">
        </div>
        <form method="post" action="#">
            <h1>Login</h1>
            <div class="form-input">
                <label for="username">Username:</label>
                <input name="username" id="username" type="text" placeholder="Username">
            </div>
            <div class="form-input">
                <label for="password">Password:</label>
                <input name="password" id="password" type="password" placeholder="Password">
            </div>
            <div class="form-input">
                <button type="submit" name="submit" onclick="return validasiLogin()">Submit</button>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>