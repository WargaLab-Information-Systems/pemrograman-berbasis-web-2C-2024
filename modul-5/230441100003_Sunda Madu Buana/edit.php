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

function editData($nimToEdit, $nim_edit, $nama_edit, $alamat_edit, $angkatan_edit) {
    global $dataMahasiswa;
    foreach ($dataMahasiswa as $index => &$mahasiswa) {
        if ($mahasiswa[0] == $nimToEdit) {
            $mahasiswa[0] = $nim_edit;
            $mahasiswa[1] = $nama_edit;
            $mahasiswa[2] = $alamat_edit;
            $mahasiswa[3] = $angkatan_edit;
            return;
        }
    }
}

if(isset($_POST['simpan'])) {
    editData($_POST['nim_to_edit'], $_POST['nim_edit'], $_POST['nama_edit'], $_POST['alamat_edit'], $_POST['angkatan_edit']);
    header("Location: mahasiswa.php"); 
    exit;
}

$index = $_GET['index'];
$mahasiswaToEdit = $dataMahasiswa[$index];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .edit-mhs {
            background-color: #EEF7FF;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto; 
            max-width: 500px;
        }

        .edit-mhs h2 {
            text-align: center;
            color: #333;
        }

        .edit-data {
            margin-bottom: 20px;
        }

        .edit-data label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .edit-data input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .edit-mhs a {
            text-align: center;
            color: #007bff;
            text-decoration: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="edit-mhs">
        <h2>Edit Data Mahasiswa</h2>
        <form method="post" action="">
            <input type="hidden" name="nim_to_edit" value="<?= $mahasiswaToEdit[0] ?>">
            <div class="edit-data">
                <label for="nim">NIM baru : </label>
                <input type="number" name="nim_edit" value="<?= $mahasiswaToEdit[0] ?>" required><br><br>
            </div>
            <div class="edit-data">
                <label for="nama">Nama baru : </label>
                <input type="text" name="nama_edit" value="<?= $mahasiswaToEdit[1] ?>" required><br><br>
            </div>
            <div class="edit-data">
                <label for="alamat">Alamat baru : </label>
                <input type="text" name="alamat_edit" value="<?= $mahasiswaToEdit[2] ?>" required><br><br>
            </div>
            <div class="edit-data">
                <label for="angkatan">Angkatan baru : </label>
                <input type="number" name="angkatan_edit" value="<?= $mahasiswaToEdit[3] ?>" required><br><br>
            </div>
            <input type="submit" name="simpan" value="Simpan Data"><br><br>
        </form>
        
        <a href="mahasiswa.php">Kembali</a>
    </div>  
</body>
</html>