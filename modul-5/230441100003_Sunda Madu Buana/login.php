<?php
session_start();

if(isset($_SESSION['username'])) {
    header("Location: home.php");
    exit;
}

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if($username === 'ryuno' && $password === 'sasaki') {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit;
    } else {
        $gagal = "<script>alert('anda gagal login.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 30%;
            margin: 100px auto;
            background-color: lightcyan;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        p {
            margin: 10px 0;
            color: #777;
        }

        form {
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 50%;
            padding: 10px;
            margin: 5px 0 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 10px;
            margin: 5px 0 10px;
            background-color: #007bff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            width: 30%;
            color: white;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
    </style>
</head>
<body>
    <center>
        <div class="container">
            <h2>Silahkan login terlebih dahulu</h2>

            <?php if(isset($gagal)) { ?>
            <p class="gagal"><?php echo $gagal; ?></p>
            <?php } ?>
            
            <form action="" method="post">
                <p>Username</p>
                <input type="text" name="username">
                <p>Password</p>
                <input type="password" name="password"><br><br>
                <input type="submit" name="submit">
            </form>
        </div>
    </center>

</body>
</html>