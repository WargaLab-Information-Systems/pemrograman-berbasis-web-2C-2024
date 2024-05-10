<?php
    if(!isset($_SESSION)) { 
        session_start(); 
        if(isset($_SESSION['user'])) {
            header('Location: home.php');
        }
        if (isset($_POST['submit'])) {
            if (!empty($_POST['username']) AND !empty($_POST['password'])) {
                $_SESSION['user']['username'] = $_POST['username'];
                $_SESSION['user']['password'] = $_POST['password']; 
                header('Location: home.php');
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="" method="post">
        <section class="form_biodata">
            <main class="content">
                <center>
                    <h1>Login</h1>
                    <form name="data">
                        <input type="text" id="username" name="username" placeholder="Masukan Username" required><br>
                        <input type="password" id="password" name="password" placeholder="Masukan Password" required><br>
                        <button type="submit" class="btn" name="submit">Login</button>
                    </form>
                </center>
            </main>
        </section>
    </form>
</body>
</html>
