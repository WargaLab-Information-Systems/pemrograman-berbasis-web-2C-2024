<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

// Ambil data user dari session
$nama = $_SESSION["nama"];
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        /* Reset CSS */
        body {
            background-image: url('img.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            
        }

        /* Body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Header */
        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-align: center;
            color: #333;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            padding: 1rem;
            background-color: #007bff;
            color: #fff;
        }

        /* User Info */
        /* .user-info {
            background-color:#999;
;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 2rem;
        } */

        /* Button */
        .btn {
            display: inline-block;
            padding: 1rem 2rem;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 10rem;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;

            }


        /* Responsive */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <h1>Selamat Datang di Dashboard,<p></p><i><?php echo $nama; ?></i></h1>
    <div class="user-info">
        <p></p>
    </div>
    <a href="mahasiswa.php" class="btn">Data Mahasiswa</a>
    <a href="logout.php" class="btn">Logout</a>
</body>
</html>