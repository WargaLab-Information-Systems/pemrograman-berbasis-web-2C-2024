<!-- php buat registrasi -->
 <?php
$akun = array(
  "username"=>"muhammadyusri121",
  "password" => "1234"
);
?>

<!-- php buat login -->
<?php

    $pesan ="";
    
    session_start();
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $_SESSION["nama"]=$username;
        if($username==$akun['username'] && $password==$akun["password"]){

        
        
    
            // Redirect ke halaman home
            header("Location:home.php");
            exit();
        } else {
            $pesan = "Data tidak ditemukan";
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
      </div>
      <!-- form login -->
        <i><?= $pesan?></i>
      <form id="login" class="input-group" action="index.php" method="post">
        <input type="text" class="input-field" placeholder="Username" name="username">
        <input type="password" class="input-field" placeholder="Enter Password" name="password">
        <input type="checkbox" class="check-box"><span>Remember Password</span>
        <button type="submit" class="submit-btn" name="login">Log in</button>
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
  </script>
</body>
</html>