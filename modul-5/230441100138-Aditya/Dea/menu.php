<?php

session_start();
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffc107;
            color: #343a40;
        }

        .navbar-custom {
            background-color: #007bff;
        }

        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }

        .content {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 60px;
        }

        h3 {
            color: #007bff;
        }

        .btn-custom {
            background-color: #28a745;
            color: #fff;
            font-weight: bold;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .img-fluid {
            border-radius: 10px;
            margin-top: 74px;
            max-width: 120%
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Data Informations</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tabel.php">Information Table</a>
                    </li>
                    <li class="nav-item">
                        <form action="menu.php" method="POST">
                            <button type="submit" name="logout" class="btn btn-warning">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="content text-center">
                    <h3 class="mb-4">Selamat Datang <?= isset($_SESSION["Username"]) ? $_SESSION["Username"] : '' ?></h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias tenetur perferendis explicabo dignissimos? Aliquam esse fugiat quidem quae cumque neque libero eos cum, aliquid sequi ab, consectetur voluptatum porro nisi numquam illo est magni sunt rerum. Praesentium tempore quos ullam.</p>
                    <a href="tabel.php" class="btn btn-info mt-4">Klik ke CRUD</a>
                </div>
            </div>
            <div class="col-md-4 mt-4 mt-md-0">
                <img src="assets/pngwing.com (5).png" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</body>
</html>