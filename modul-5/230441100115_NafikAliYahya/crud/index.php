<?php
error_reporting(0);
session_start();
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user == 'napik' AND $pass == 'ardat') {

        session_start();
        $_SESSION['username'] = $user;
        $_SESSION['berhasil'] = true;
        header("Location: hompage.php");

    } else {
        $salah = "<p style='color: red; text-align: center;'>username & password yang anda masukkan salah!</p>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="login-box">
        <div class="login-header">
            <header>Login</header>
        </div>
        <?php echo $salah; ?>
        <form action="" method="post">
            <div class="input-box">
                <input type="text" name="username" class="input-field" placeholder="Username" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="input-submit">
                <input type="submit" name="login" class="submit-btn" id="submit">
            </div>
        </form>
    </div>
</body>
</html>