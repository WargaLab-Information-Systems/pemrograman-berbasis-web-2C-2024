<?php

include "services/database.php";
session_start();


if (isset($_SESSION["is_login"])) {
    header("location: menu.php");
}
$msg_daftar = "";
if (isset($_POST["daftar"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hash_password = hash("md5", $password);


    try {
        $sql = "INSERT INTO users (username, password) VALUES
            ('$username','$hash_password')";

        if ($db->query($sql)) {
            $msg_daftar = "Akun anda telah berhasil dibuat, silahkan Login";
        } else {
            $msg_daftar = "Daftar akun anda gagal , silahkan coba lagi";
        }
    } catch (mysqli_sql_exception) {
        $msg_daftar = "Username Sudah Digunakan, Silahkan Coba Usename Lain";
    }
    $db->close();


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Now !</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        body {
            background-color: #abddf4;
            justify-content: center;
            justify-items: center;
            font-family: 'Poppins', sans-serif;
            color: black;
        }

        .mx-auto {
            width: 800px;
            margin-top: 120px;
            border: solid white 5px;
            border-radius: 20px;
            padding: 10px;
        }

        .img-fluid {
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }

        .fs-1 {
            margin-left: 10px;
        }

        .form {
            text-align: center;
            justify-content: center;

        }

        .input {
            margin: 30px 0;
        }

        input {
            border-radius: 5px;
            padding-left: 5px;
            margin-right: 10px;
            width: 90%;


        }

        input::placeholder {
            text-align: center;
        }

        .btn {
            text-align: center;
            margin-right: 15px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <div class="row">
            <div class="col-6">
                <img src="https://i.pinimg.com/564x/3e/e7/9a/3ee79a7c2df0175f5d7ee03caf7877bc.jpg" class="img-fluid"
                    alt="" width="100%">
            </div>
            <div class="col-6">
                <form action="daftar.php" method="POST" class="form">
                    <h3 style="margin-top:50px" class="fs-1 fw-bold">Make Your Own Account !</h3>
                    <i><?= $msg_daftar ?></i><br>
                    <div class="input">
                        <input type="text" class="form-control" name="username" placeholder="Your Username" />
                    </div>
                    <div class="input">
                        <input type="password" class="form-control" name="password" placeholder="Your Password" />
                    </div>
                    <a href="login.php"><button type="button" name="login" class="btn btn-primary"
                            style="width:90px">Login</button></a>
                    <button type="submit" name="daftar" class="btn btn-primary" style="width:90px">Register</button>
                </form>
            </div>
        </div>

    </div>

</html>