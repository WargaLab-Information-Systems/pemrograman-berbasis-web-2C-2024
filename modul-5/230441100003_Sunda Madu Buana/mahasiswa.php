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

function hapusData($index) {
    global $dataMahasiswa;
    array_splice($dataMahasiswa, $index, 1);
}

if(isset($_GET['action']) && $_GET['action'] == 'delete') {
    hapusData($_GET['index']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .mahasiswa {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .mahasiswa h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #5AB2FF;
        }

        td {
            background-color: #CAF4FF;
        }

        .button {
            text-align: center;
            margin-top: 20px;
        }

        .button button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
            text-decoration: none;
            cursor: pointer;
        }

        .button a {
            color: #fff;
            text-decoration: none;
        }
        
    </style>
</head>
<body>
    <div class="mahasiswa">
        <h2>Data Mahasiswa</h2>
        <table>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Angkatan</th>
                <th>Action</th>
            </tr>
            <?php foreach ($dataMahasiswa as $index => $mahasiswa): ?>
                <tr>
                    <td><?= $mahasiswa[0] ?></td>
                    <td><?= $mahasiswa[1] ?></td>
                    <td><?= $mahasiswa[2] ?></td>
                    <td><?= $mahasiswa[3] ?></td>
                    <td>
                        <a href='edit.php?index=<?= $index ?>'>Edit</a>
                        <a href='?action=delete&index=<?= $index ?>'>Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table><br><br>
        <div class="button">
            <button class="tambah">
                <a href="tambah.php">Tambah Data</a><br>
            </button>
            <button class="logout">
                <a href="logout.php">Logout</a>
            </button>
        </div>
    </div>  
</body>
</html>