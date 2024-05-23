<?php
    session_start();
    if (!isset($_SESSION)) {
        header("Location: login.php");
    }

    if (isset($_SESSION["isLogin"]) == false) {
        header("Location: login.php");
    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page CRUD</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

</head>

<body>
    <header class="header">
        <a href="" class="logo"><i class="fa-regular fa-user"></i><?= $_SESSION["nama"]?></a>

        <nav class="navbar">
            <a href="#">Home</a>
            <a href="tambah.php" style="padding: 15px;" >Tambah</a>
            <a href="data.php">Data</a>
            <a href="logout.php" onclick="logout()">Logout</a>
            <script>
                function logout(){
                    alert('Berhasil Logout...')
                }   
            </script>
        </nav>
    </header>
    <div class="welcome">
        <h1>Selamat Datang <?= $_SESSION["nama"]?></h1>
    </div>
</body>

</html>