<?php
  include ("Service/conn.php");
  session_start();
  if (isset($_SESSION["isLogin"])) {
    header("Location: index.php");
  }

  if (isset($_POST["login"])) {
      $username = $_POST["username"];
      $password = $_POST["password"];
  
      $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  
      $result = $db->query($sql);
  
      if ($result->num_rows > 0) {
          $data = $result->fetch_assoc();
          $_SESSION["nama"] = $data["nama"];
          $_SESSION["username"] = $data["username"];
          $_SESSION["isLogin"] = true;
          header("Location: index.php");
      } else {
          echo "<script>alert('Login Gagal..!');
          window.location.href = 'login.php';
          </script>";
          // header("Location: ../login.php");
      }
  }

  if (isset($_POST["register"])) {
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO user (nama, username, password) VALUES ('$nama', '$username ', '$password')";
    if ($db->query($sql)) {     
        echo "<script>
            alert('Registrasi Berhasil...');
            window.location.href = 'login.php';
            </script>";
    } else {
        echo "<script>alert('Registrasi Gagal..!');
        window.location.href = 'login.php';
        </script>";       
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        
        * {
            font-family: "Poppins", sans-serif;
        }
        *::before,
        *::after {
            box-sizing: border-box;

        }

        body {
            margin: 0;
            font-family: Roboto, -apple-system, 'Helvetica Neue', 'Segoe UI', Arial, sans-serif;
            background: url('img/Background.png') no-repeat;
            background-position: center;
            background-size: cover;
        }

        .forms-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .section-title {
            font-size: 32px;
            letter-spacing: 1px;
            color: #fff;
        }

        .forms {
            display: flex;
            align-items: flex-start;
            margin-top: 30px;
        }

        .form-wrapper {
            animation: hideLayer .3s ease-out forwards;
        }

        .form-wrapper.is-active {
            animation: showLayer .3s ease-in forwards;
        }

        @keyframes showLayer {
            50% {
                z-index: 1;
            }

            100% {
                z-index: 1;
            }
        }

        @keyframes hideLayer {
            0% {
                z-index: 1;
            }

            49.999% {
                z-index: 1;
            }
        }

        .switcher {
            position: relative;
            cursor: pointer;
            display: block;
            margin-right: auto;
            margin-left: auto;
            padding: 0;
            text-transform: uppercase;
            font-family: inherit;
            font-size: 16px;
            letter-spacing: .5px;
            color: #999;
            background-color: transparent;
            border: none;
            outline: none;
            transform: translateX(0);
            transition: all .3s ease-out;
        }

        .form-wrapper.is-active .switcher-login {
            color: #fff;
            transform: translateX(90px);
        }

        .form-wrapper.is-active .switcher-signup {
            color: #fff;
            transform: translateX(-90px);
        }

        .underline {
            position: absolute;
            bottom: -5px;
            left: 0;
            overflow: hidden;
            pointer-events: none;
            width: 100%;
            height: 2px;
        }

        .underline::before {
            content: '';
            position: absolute;
            top: 0;
            left: inherit;
            display: block;
            width: inherit;
            height: inherit;
            background-color: currentColor;
            transition: transform .2s ease-out;
        }

        .switcher-login .underline::before {
            transform: translateX(101%);
        }

        .switcher-signup .underline::before {
            transform: translateX(-101%);
        }

        .form-wrapper.is-active .underline::before {
            transform: translateX(0);
        }

        .form {
            overflow: hidden;
            min-width: 260px;
            margin-top: 50px;
            padding: 30px 25px;
            border-radius: 5px;
            transform-origin: top;
        }

        .form-login {
            animation: hideLogin .3s ease-out forwards;
        }

        .form-wrapper.is-active .form-login {
            animation: showLogin .3s ease-in forwards;
        }

        @keyframes showLogin {
            0% {
                background: #d7e7f1;
                transform: translate(40%, 10px);
            }

            50% {
                transform: translate(0, 0);
            }

            100% {
                background-color: #fff;
                transform: translate(35%, -20px);
            }
        }

        @keyframes hideLogin {
            0% {
                background-color: #fff;
                transform: translate(35%, -20px);
            }

            50% {
                transform: translate(0, 0);
            }

            100% {
                background: #d7e7f1;
                transform: translate(40%, 10px);
            }
        }

        .form-signup {
            animation: hideSignup .3s ease-out forwards;
        }

        .form-wrapper.is-active .form-signup {
            animation: showSignup .3s ease-in forwards;
        }

        @keyframes showSignup {
            0% {
                background: #d7e7f1;
                transform: translate(-40%, 10px) scaleY(.8);
            }

            50% {
                transform: translate(0, 0) scaleY(.8);
            }

            100% {
                background-color: #fff;
                transform: translate(-35%, -20px) scaleY(1);
            }
        }

        @keyframes hideSignup {
            0% {
                background-color: #fff;
                transform: translate(-35%, -20px) scaleY(1);
            }

            50% {
                transform: translate(0, 0) scaleY(.8);
            }

            100% {
                background: #d7e7f1;
                transform: translate(-40%, 10px) scaleY(.8);
            }
        }

        .form fieldset {
            position: relative;
            opacity: 0;
            margin: 0;
            padding: 0;
            border: 0;
            transition: all .3s ease-out;
        }

        .form-login fieldset {
            transform: translateX(-50%);
        }

        .form-signup fieldset {
            transform: translateX(50%);
        }

        .form-wrapper.is-active fieldset {
            opacity: 1;
            transform: translateX(0);
            transition: opacity .4s ease-in, transform .35s ease-in;
        }

        .form legend {
            position: absolute;
            overflow: hidden;
            width: 1px;
            height: 1px;
            clip: rect(0 0 0 0);
        }

        .input-block {
            margin-bottom: 20px;
        }

        .input-block label {
            font-size: 14px;
            color: #a1b4b4;
        }

        .input-block input {
            display: block;
            width: 100%;
            margin-top: 8px;
            padding-right: 15px;
            padding-left: 15px;
            font-size: 16px;
            line-height: 40px;
            color: #3b4465;
            background: #eef9fe;
            border: 1px solid #cddbef;
            border-radius: 2px;
        }

        .form [type='submit'] {
            opacity: 0;
            display: block;
            min-width: 120px;
            margin: 30px auto 10px;
            font-size: 18px;
            line-height: 40px;
            border-radius: 25px;
            border: none;
            transition: all .3s ease-out;
        }

        .form-wrapper.is-active .form [type='submit'] {
            opacity: 1;
            transform: translateX(0);
            transition: all .4s ease-in;
        }

        .btn-login {
            color: #fbfdff;
            background: #5847b6;
            transform: translateX(-30%);
        }

        .btn-signup {
            color: #5847b6;
            background: #fbfdff;
            box-shadow: inset 0 0 0 2px #5847b6;
            transform: translateX(30%);
        }
    </style>
    <title>Login php</title>
</head>

<body>
    
    <section class="forms-section">
        <h1 class="section-title" style="margin-top: 70px;">Form Login & Register</h1>
        <div class="forms">
            <div class="form-wrapper is-active">
                <button type="button" class="switcher switcher-login">
                    Login
                    <span class="underline"></span>
                </button>
                <form class="form form-login" method="post" action="login.php">
                    <fieldset>
                        <div class="input-block">
                            <label for="login-username">Username</label>
                            <input id="login-username" name="username" type="text" placeholder="Masukkan Username" required>
                        </div>
                        <div class="input-block">
                            <label for="login-password">Password</label>
                            <input id="login-password" name="password" type="password" placeholder="Masukkan Password" required>
                        </div>
                    </fieldset>
                    <button type="submit" name="login" class="btn-login">Login</button>
                </form>
            </div>
            <div class="form-wrapper">
                <button type="button" class="switcher switcher-signup">
                    Register
                    <span class="underline"></span>
                </button>
                <form class="form form-signup" method="post" action="login.php">
                    <fieldset>
                        <div class="input-block">
                            <label for="signup-name">Nama</label>
                            <input id="signup-name" type="text" name="nama" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="input-block">
                            <label for="signup-username">Username</label>
                            <input id="signup-username" type="text" name="username" placeholder="Masukkan Username" required>
                        </div>
                        <div class="input-block">
                            <label for="signup-confirm">Password</label>
                            <input id="signup-confirm" type="password" name="password" placeholder="Masukkan Password" required>
                        </div>
                    </fieldset>
                    <button type="submit" name="register" class="btn-signup">Register</button>
                </form>
            </div>
        </div>
    </section>
    <script>
        const switchers = [...document.querySelectorAll('.switcher')]

        switchers.forEach(item => {
            item.addEventListener('click', function() {
                switchers.forEach(item => item.parentElement.classList.remove('is-active'))
                this.parentElement.classList.add('is-active')
            })
        })
    </script>
</body>

</html>