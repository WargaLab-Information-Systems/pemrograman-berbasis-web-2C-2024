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
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .nav-item-btn {
            padding-left: 800px;
        }

        .selamat {
            margin-top: 30px;
            text-align: end;
        }

        .container {
            margin-top: 100px;
        }

        .container .col-7 {
            margin-top: 50px;

        }

        .container .col-7 p,
        h3 {
            text-align: end;
        }

        .row .btn {
            width: 20%;
            align-items: center;
            text-align: center;
            margin-top: 30px;
        }

        .row .btn a {
            text-decoration: none;
            font-weight: bold;
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Data Informations.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="menu.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tabel.php">Informations Tabel</a>
                    </li>
                    <li class="nav-item-btn">
                        <form action="menu.php" method="POST">
                            <button type="submit" name="logout" class="btn btn-danger">logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>

        <div class="container">
            <div class="row">
                <div class="col-7" style="text-align:left">
                    <h3 class="selamat fw-bold">Hai <span style="color:red;"><?= $_SESSION["username"] ?></span>,</h3>
                    <p>Selamat datang di website kami, senang bertemu denganmu </p>
                    <p>
                        Kami dengan bangga menyambut Anda di halaman utama <span style="color:red;">Data
                            Informations</span>, tempat di mana Anda dapat
                        menemukan informasi yang bermanfaat, inspirasi, dan pengalaman yang menarik. Dengan komunitas
                        yang berkembang pesat dan beragam konten yang disajikan, kami bertekad untuk menjadi teman setia
                        Anda dalam setiap langkah perjalanan Anda.</p>

                </div>
                <div class="col-4">
                    <img src="https://i.pinimg.com/564x/02/68/e0/0268e0d2c0645ef1284f7444153ffbed.jpg" alt="">
                </div>

            </div>
            <div class="row">
                <button type="button" class="btn btn-success mx-auto"><a href="tabel.php">Move To Table Page
                        !</a></button>
            </div>
        </div>

    </main>

</body>

</html>