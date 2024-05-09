<?php
    session_start();

    $user = array(
        'Based' => '12345',
        'Abas' => '09876'
    );

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(array_key_exists($username, $user) && $user[$username] == $password){
        $_SESSION ['username'] = $username;
        header('Location: home.php');
        exit();
    }else{
        $error = "Username atau Password salah. Silahkan coba lagi";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/230441100055-AbdBased/css/login.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h3 class="judul">Login</h3>
            <div class="input-data">
                <label class="input-label" for="username">Username</label>
                <input type="text" name="username" id="useraname" placeholder="Masukkan Useraname Anda" required>
            </div>
            <div class="input-data">
                <label class="input-label" for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password Anda" required>
            </div>
            <div class="input-data">
                <center><input type="submit" name="login" value="Login"></center>
            </div>
        </form>

    </div>
</body>
</html>