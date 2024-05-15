<?php
    if(!isset($_SESSION)) {
        session_start();
        if(isset($_SESSION['user'])) {
            $userLogin = false;
            for ($i=0; $i < count($_SESSION['user']); $i++) {
                if($_SESSION['user'][$i]['isLogin'] === true) {
                    $userLogin = true;
                    break;
                }
            }
            if(!$userLogin) {
                header('Location: login.php');
            }
        } else {
            header('Location: login.php');
        }
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
        <a href="" class="logo"><i class="fa-regular fa-user"></i><?= $_SESSION['userLogin']['nama'] ?></a>

        <nav class="navbar">
            <a href="#">Home</a>
            <a href="crud.php">CRUD</a>
            <a href="logout.php" onclick="logout()">Logout</a>
            <script>
                function logout(){
                    alert('Berhasil Logout...')
                }   
            </script>
        </nav>
    </header>
    <div class="welcome">
        <h1>Selamat Datang <?= $_SESSION['userLogin']['nama'] ?></h1>
    </div>
</body>

</html>