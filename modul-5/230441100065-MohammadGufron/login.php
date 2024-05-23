<?php
// Mulai sesi
session_start();

// Validasi login
$user = array(
    "fron" => "1" // Contoh nama pengguna dan kata sandi
    // Contoh nama pengguna dan kata sandi
    // Disini untuk menyimpan data pengguna
);

// Periksa jika metode permintaan adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (isset($user[$username]) && $user[$username] == $password) {
        // Set session login_user
        $_SESSION['login_user'] = $username;
        // Arahkan ke halaman selamat datang setelah login berhasil
        header("location: home.php");
        exit;
    } else {
        $error = "Username atau Password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
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
        .login-container {
            background-color: rgba(0, 0, 0, 0);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 5);
            text-align: center;
            height: 400px;
            width: 400px;
        }
        h2 {
            padding: 10px;
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 40px;
            color: #333333;
        }
        label {
            font-weight: bold;
            text-align: left;
            display: block; 
            margin-top: 20px;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            padding: 10px;
            margin: 5px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #0400ff;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #003cff;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Silakan Login</h2>
        <!-- Form login dengan method POST -->
        <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]);?>">
            <label class="user" for="username">Username: </label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Login" required>
        </form>
        <!-- Tampilkan pesan error jika login gagal -->
        <?php
        if (isset($error)) {
            echo '<p style="color: #fc0505;">' . $error . '</p>';
        }
        ?>
    </div>
</body>
</html>
