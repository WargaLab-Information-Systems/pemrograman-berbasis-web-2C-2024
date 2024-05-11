<?php
session_start();

// Cek apakah pengguna sudah login, jika ya, redirect ke halaman home
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit;
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah username dan password sesuai (contoh sederhana, Anda bisa ganti dengan validasi yang sesuai)
    if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin123') {
        // Simpan username di session
        $_SESSION['username'] = $_POST['username'];
        
        // Redirect ke halaman home
        header("Location: home.php");
        exit;
    } else {
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)): ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="post">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
