<!-- php buat registrasi -->
 <?php
    include "service/database.php";
    $pesan_registrasi ="";
    if (isset($_POST["register"])){
        $nama     = $_POST["nama"];
        $username = $_POST["username"];
        $password = $_POST["password"];
    }
?>

<!-- php buat login -->
<?php

    include "service/database.php";
    $pesan ="";
    
    session_start();
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $sql = "SELECT * FROM users  WHERE username='$username' AND password= '$password'";
        
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
    
            // Menyimpan data user ke dalam session
            $_SESSION["user_id"] = $data["id"];
            $_SESSION["nama"] = $data["nama"];
            $_SESSION["username"] = $data["username"];
    
            // Redirect ke halaman home
            header("Location:mahasiswa.php");
            exit();
        } else {
            $pesan = "Data tidak ditemukan";
        }
    }
    // php buat register
    if (isset($_POST["register"])) {
        $nama = $_POST["nama"];
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        $sql = "INSERT INTO users (nama, username, password) VALUES ('$nama', '$username', '$password')";
    
        if ($db->query($sql) === TRUE) {
            $pesan_registrasi = "Registrasi berhasil";
        } else {
            $pesan_registrasi = "Error: " . $sql . "<br>" . $db->error;
        }
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Register dan Login</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <div class="form-box">
      <div class="button-box">
        <div id="btn"></div>
        <button type="button" class="toggle-btn" onclick="login()">Log In</button>
        <button type="button" class="toggle-btn" onclick="register()">Register</button>
      </div>
      <!-- form login -->
        <i><?= $pesan?></i>
      <form id="login" class="input-group" action="index.php" method="post">
        <input type="text" class="input-field" placeholder="Username" name="username">
        <input type="password" class="input-field" placeholder="Enter Password" name="password">
        <input type="checkbox" class="check-box"><span>Remember Password</span>
        <button type="submit" class="submit-btn" name="login">Log in</button>
      </form>

        <!-- form register -->
        <i><?= $pesan_registrasi?></i>
      <form id="register" class="input-group" action="index.php" method="post">
        <input type="text" class="input-field" placeholder="Full Name" name="nama">
        <input type="text" class="input-field" placeholder="Username" name="username">
        <input type="password" class="input-field" placeholder="Enter Password" name="password">
        <button type="submit" class="submit-btn" name="register">Register</button>
      </form>
    </div>
  </div>

  <script>
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");

    function login(){
      x.style.left = "50px";
      y.style.left = "450px";
      z.style.left = "0";
    }

    function register(){
      x.style.left = "-400px";
      y.style.left = "50px";
      z.style.left = "110px";
    }
  </script>
</body>
</html>