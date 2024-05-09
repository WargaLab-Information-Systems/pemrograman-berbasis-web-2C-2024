<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['dataMahasiswa'])) {
    $_SESSION['dataMahasiswa'] = array(
        array("23002", "Radhina", "Bangkalan", "2023"),
        array("23003", "Madu", "Bandung", "2023"),
    );
}

$dataMahasiswa =& $_SESSION['dataMahasiswa'];

function tambahData($nim, $nama, $alamat, $angkatan) {
    global $dataMahasiswa;
    $dataMahasiswa[] = array($nim, $nama, $alamat, $angkatan);
}

if(isset($_POST['submit'])) {
    tambahData($_POST['nim'], $_POST['nama'], $_POST['alamat'], $_POST['angkatan']);
    header("Location: mahasiswa.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .tambah-data {
            background-color: #EEF7FF;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto; 
            max-width: 500px;
        }

        .tambah-data h3 {
            text-align: center;
            color: #333;
        }

        .form-data {
            margin-bottom: 20px;
        }

        .form-data label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-data input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .tambah-data a {
            text-align: center;
            color: #007bff;
            text-decoration: none;
            margin-top: 20px;
        }

    </style>
</head>
<body>
    <div class="tambah-data">
    <h3>Tambah Data Mahasiswa</h3>
        <form method="post" action="">
            <div class="form-data">
                <label for="nim">NIM : </label>
                <input type="number" name="nim" placeholder="NIM" required><br><br>
            </div>
            <div class="form-data">
                <label for="nama">Nama : </label>
                <input type="text" name="nama" placeholder="Nama" required><br><br>
            </div>
            <div class="form-data">
                <label for="alamat">Alamat : </label>
                <input type="text" name="alamat" placeholder="Alamat" required><br><br>
            </div>
            <div class="form-data">
                <label for="angkatan">Angkatan : </label>
                <input type="number" name="angkatan" placeholder="Angkatan" required><br><br>
            </div>
            <input type="submit" name="submit" value="Tambah"><br><br>
        </form>
        <a href="mahasiswa.php">Kembali</a>
    </div>
</body>
</html>