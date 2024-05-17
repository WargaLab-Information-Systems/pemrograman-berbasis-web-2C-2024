<?php
session_start();

//menyimpan data pengguna 
$users = array(
    'Citra' => '0000',
    'Lanny' => '9999',
);

//mengambil nilai yang dimasukkan pengguna pada form.
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //memeriksa username yang dimasukkan ada dalam array
    if(array_key_exists($username, $users) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <form method="POST" action="">
            <h2 class="center">Login</h2>
            <?php if(isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
            <?php }?>
            <div class="input-group">
                <label for="username" class="input-label">Username</label>
                <input type="text" name="username" id="username" placeholder="Masukkan username Anda" required>
            </div>
            <div class="input-group">
                <label for="password" class="input-label">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password Anda" required>
            </div>
            <div class="input-group">
                <input type="submit" name="login" value="Login">
            </div>
        </form>
    </div>
</body>
</html>
